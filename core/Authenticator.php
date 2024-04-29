<?php

namespace core;

class Authenticator
{

    protected $db;

    public function __construct()
    {
        $this->db = App::resolve("core\Database");
    }


    public function attemptLogin($email, $password)
    {

        $user = $this->findUser("email", $email);

        if ($user) {
            if (password_verify($password, $user["password"])) {
                $this->login($user);

                return true;
            }
        }

        return false;
    }

    public function attemptRegister($email, $username, $password)
    {

        if ($this->findUser("email", $email) || $this->findUser("name", $username)) {
            return false;
        }

        $this->register($email, $username, $password);

        return true;
    }



    public function findUser($key, $value)
    {

        $user = $this->db->query("SELECT * from users where $key = :value", [
            "value" => $value,
        ])->find();

        if ($user) {
            return $user;
        }

        return null;
    }



    public function register($email, $username, $password) {

        $this->db->query(
            "INSERT INTO users (`name`, `email`, `password`) VALUES (:name, :email, :password)",
            [
                "name" => $username,
                "email" => $email,
                "password" => password_hash($password, PASSWORD_BCRYPT),
            ]
        );

        $user = $this->db->query("SELECT * from users where email = :email", [
            "email" => $email,
        ])->find();


        $this->login($user);
    }


    public function login($user)
    {
        Session::put("logged_in", "true");
        Session::put("user", [
            "email" => $user["email"],
            "name" => $user["name"],
            "id" => $user["id"],
        ]);
        session_regenerate_id(true);
    }


    public static function logout()
    {
        Session::destroy();
    }
}