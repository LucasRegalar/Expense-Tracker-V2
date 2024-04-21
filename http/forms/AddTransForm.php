<?php

namespace http\forms;

use core\Validator;
use core\Formatter;
use core\Form;

class addTransForm extends Form
{

    public function validate($title, $amount, $date, $category, $description)
    {

        if (!Validator::checkRequired(["title", "amount", "date", "category", "description",])) {
            $this->addError("Please fill out all the required inputs");
        }

        if (!Validator::isDate($date)) {
            $this->addError("Please enter a valid date");

        }

        $amount = Formatter::kommaToDot($amount);

        if (!Validator::isAmount($amount)) {
            $this->addError("Please enter a valid amount");
        }

        if (
            !Validator::isString($title, 5, 255) ||
            !Validator::isString($description, 5, 255)
        ) {
            $this->addError("Please enter a minumum of 5 and a maximum of 255 characters");
        }

        return (bool) empty($this->errors);
    }


}