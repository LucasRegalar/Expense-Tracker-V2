<?php

namespace core\middleware;

class Auth {

    public function handle() {
        if (!$_SESSION["user"] ?? false) {
            redirect("login");
        }
    }
}