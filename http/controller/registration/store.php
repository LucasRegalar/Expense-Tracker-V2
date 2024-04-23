<?php

use core\Session;
use core\Authenticator;
use http\forms\RegistrationForm;

$email = $_POST["email"];
$password = $_POST["password"];
$username = $_POST["username"];

$form = new RegistrationForm;
$auth = new Authenticator;


if ($form->validate($email, $password, $username)) {

    if ($auth->findUser("email", $email)) {
        //add alert?
        redirect("login");
    }

    if (!$auth->findUser("name", $username)) {
        $auth->register($email, $username, $password);
        redirect("/");
    }

    $form->addError("Sorry, the username is already taken.");
}

Session::flash("errors", $form->getErrors());
Session::flash("old", [
    "email" => $email,
    "username" => $username,
]);

redirect("register");
