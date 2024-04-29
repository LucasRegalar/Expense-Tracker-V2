<?php

use core\Session;
use core\Authenticator;
use http\forms\RegistrationForm;
use core\Responses;


$email = $_POST["email"];
$password = $_POST["password"];
$username = $_POST["username"];

$form = new RegistrationForm;
$auth = new Authenticator;



Session::flash("old", [
    "email" => $email,
    "username" => $username,
]);

//Validate Input
if (!$form->validate($email, $password, $username)) {
    sendResponse([
        "code" => Responses::BadReuest->value,
        "message" => "Validation Error.",
        "error" => "validation",
    ]);
}

//Check if email already exists
$user = $auth->findUser("email", $email);
if ($user) {
    sendResponse([
        "code" => Responses::Conflict->value,
        "message" => "Email already exists.",
        "error" => "email",
    ]);
}

//check if usermame already exists
if ($auth->findUser("name", $username)) {
    $form->addError("Sorry, the username is already taken.");
    Session::flash("errors", $form->getErrors());
    sendResponse([
        "code" => Responses::Conflict->value,
        "message" => "Username already exists.",
        "error" => "username",
    ]);
}

//register user
$auth->register($email, $username, $password);
http_response_code(Responses::Created->value); //created = 201
sendResponse([
    "code" => Responses::Created->value,
    "message" => "Registration successful.",
    "error" => "",
]);