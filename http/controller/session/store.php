<?php
use core\Authenticator;
use http\forms\LoginForm;
use core\Session;


$email = $_POST["email"];
$password = $_POST["password"];

$form = new LoginForm;
//Frage Rose: Wann static? Ich könnte die Authenticator methoden auch static machen.
$auth = new Authenticator;



if ($form->validate($email, $password)) {
    
    if($auth->attemptLogin($email, $password)) {
        redirect("/");
    }

    $form->addError("No user for provided email and password found");
}


Session::flash("errors", $form->getErrors());
Session::flash("old", ["email" => $email]);
redirect("login");
