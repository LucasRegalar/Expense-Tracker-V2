<?php

namespace core;

class Form
{

    protected $errors = [];

    public function getErrors() {
        return $this->errors;
    }

    public function addError($body) {
        $this->errors["body"] = $body;
    }

}