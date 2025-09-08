<?php

use Core\Session;
use Core\ValidationException;
use Core\ValididationException;

session_start();

const BASE_PATH = __DIR__ . '/../';

require(BASE_PATH .'core/functions.php');

spl_autoload_register(function ($class) {
    $result = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path("{$result}.php");
});

require base_path('bootstrap.php');

$router = new \Core\Router();
$routes = require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {
    $router->route($uri, $method);
} catch (ValidationException $e) {
    Session::flash('errors', $e->errors);
    Session::flash('old', [
        'email' => $e->email
    ]);

    redirect($router->previousUrl());
}

Session::unflash();
