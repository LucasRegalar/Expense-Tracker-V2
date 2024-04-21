<?php
use core\Validator;
use http\forms\LogInForm;
use core\Session;
use core\App;


//hard code for now
$userId = 1;

$email = $_POST["email"];
$password = $_POST["password"];

$form = new LogInForm;
// Input Validation

if (!Validator::isEmail($email)) {
    $form->addError("Please enter a valid E-Mail adress");
}

if (!Validator::isString($password)) {
    $form->addError("Please provide a valid password");
}

if (!empty($form->getErrors())) {
    Session::flash("errors", $form->getErrors());
    Session::flash("old", ["email" => $email]);
    redirect("login");
}

// Authentication

$db = App::resolve("core\Database");


$user = $db->query("SELECT * from users where email = :email", [
    "email" => $email,
])->find();

if (!$user) {
    $form->addError("No user for provided email and password found");
}

if (!empty($form->getErrors())) {
    Session::flash("errors", $form->getErrors());
    Session::flash("old", ["email" => $email]);
    redirect("login");
}

// Log in 

if ($password === $user["password"]) {
    Session::put("logged_in", "true");
    Session::put("user", [
        "email"=> $email,
        "name" => $user["name"],
    ]);
    session_regenerate_id(true);
    redirect("/");
} else {
   $form->addError("No user for provided email and password found");
}

if (!empty($form->getErrors())) {
    Session::flash("errors", $form->getErrors());
    Session::flash("old", ["email" => $email]);
    redirect("login");
}

exit();

// redirect home

