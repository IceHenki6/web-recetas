<?php

use Core\ValidationException;
use Core\Session;

session_start();

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {
    $class = str_replace('\\',DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}.php");
});

require base_path('bootstrap.php');

$router = new \Core\Router();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = require base_path('routes.php');

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try{
    $router->route($uri, $method);
} catch(ValidationException $exception) {
    Session::flash('errors', $exception->errors);

    Session::flash('old', $exception->old);

    return redirect($router->previousUrl());
}

Session::unflash();

