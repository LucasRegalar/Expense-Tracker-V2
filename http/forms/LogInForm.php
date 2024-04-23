<?php

namespace http\forms;

use core\Form;
use core\Validator;

class LogInForm extends Form {
    
    public function validate($email, $password) {

        if (!Validator::isEmail($email)) {
            $this->addError("Please enter a valid E-Mail adress");
        }
        
        if (!Validator::isString($password)) {
            $this->addError("Please provide a valid password");
        }
        
        return (bool) empty($this->errors);
    }
}