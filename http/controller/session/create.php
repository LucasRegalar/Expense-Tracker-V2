<?php

use core\Session;


view ("session/create.view.php", [
    "errors" => Session::get("errors"),
    "old" => Session::get("old"),
]);