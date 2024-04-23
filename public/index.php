<?php 

use core\Router;
use core\Session;

session_start();

const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . "core/functions.php";

spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});

require base_path("bootstrap.php");
require base_path("http/utilities.php");

$router = new Router();
$routes = require base_path("routes.php");



$uri = parse_url(($_SERVER["REQUEST_URI"]))["path"];
$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];

//implement try catch?
$router->route($uri, $method);

Session::unflash();
