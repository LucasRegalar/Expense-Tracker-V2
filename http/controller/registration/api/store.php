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
    sendResponse(
        Responses::BadReuest->value,
        "Validation Error.",
        "validation",
    );
}

//Check if email already exists
$user = $auth->findUser("email", $email);
if ($user) {
    sendResponse(
        Responses::Conflict->value,
        "Email already exists.",
        "email",
    );
}

//check if usermame already exists
if ($auth->findUser("name", $username)) {
    $form->addError("Sorry, the username is already taken.");
    Session::flash("errors", $form->getErrors());
    sendResponse(
        Responses::Conflict->value,
        "Username already exists.",
        "username",
    );
}

//register user
$auth->register($email, $username, $password);
http_response_code(Responses::Created->value); //created = 201
sendResponse(
    Responses::Created->value,
    "Registration successful.",
);