<?php

namespace core;

class Formatter {

    public static function kommaToDot($value) {
        $pattern = "/\,/";
        return preg_replace($pattern,".", $value);
    }
}