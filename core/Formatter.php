<?php

namespace core;

class Formatter {

    public static function commaToDot($value) {
        $pattern = "/\,/";
        return preg_replace($pattern,".", $value);
    }
}