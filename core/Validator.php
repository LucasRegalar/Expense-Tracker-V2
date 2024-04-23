<?php 

namespace core;

use \DateTime;

class Validator {
    public static function isString($value, $min = 1, $max = INF) {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function isEmail($value) {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function areSet(array $values) {
        foreach ($values as $value) {
            if (!isset($_POST[$value])) {
                return false;
            }

        };
        return true;
    }

    //check if yyyy-mm-dd
    public static function isDate($dateString) {
        // Attempt to create a DateTime object from the date string with the format "yyyy-mm-dd"
        $date = DateTime::createFromFormat('Y-m-d', $dateString);
        
        // Check if the date string matches the format "yyyy-mm-dd" and is a valid date
        return $date && $date->format('Y-m-d') === $dateString;
    }

    public static function isAmount($amount) {
        if(!preg_match("/^\d+(\.?\d{1,2})?$/", $amount)) {
            return false;
        }

        if ((float) $amount < 0) {
            return false;
        }

        return true;
    }

}