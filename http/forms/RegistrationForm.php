<?php

namespace http\forms;

use core\Validator;
use core\Form;

class RegistrationForm extends Form {

    public function validate($email, $password, $username) {

        if (!Validator::isEmail($email)) {
            $this->addError("Please enter a valid E-Mail adress");
        }
        
        if (!Validator::isString($password, 7, 255)) {
            $this->addError("Please provide a password with 7-255 characters");
        }

        if (!Validator::isString($username, 3, 20)) {
            $this->addError("Please provide a username with 3-20 characters");
        }
        
        return (bool) empty($this->errors);
    }
}