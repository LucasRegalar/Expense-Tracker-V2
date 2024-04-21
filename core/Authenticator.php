<?php 

namespace core;

class Authenticator {
    public static function logout() {
        Session::destroy();
    }
}