<?php

namespace http\forms;

use core\Validator;
use core\Formatter;
use core\Form;

class TransForm extends Form
{

    public function validate($title, $amount, $date, $category, $description)
    {

        if (!Validator::areSet(["title", "amount", "date", "category", "description",])) {
            $this->addError("Please fill out all the required inputs");
        }

        if (!Validator::isDate($date)) {
            $this->addError("Please enter a valid date");

        }

        $amount = Formatter::commaToDot($amount);

        if (!Validator::isAmount($amount)) {
            $this->addError("Please enter a valid amount");
        }

        if (
            !Validator::isString($title, 1, 255) ||
            !Validator::isString($description, 1, 255)
        ) {
            $this->addError("Please enter a minumum of 1 and a maximum of 255 characters");
        }

        return (bool) empty($this->errors);
    }


}