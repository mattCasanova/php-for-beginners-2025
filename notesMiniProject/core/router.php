<?php

use Core\Response;

function abort($code = Response::HTTP_NOT_FOUND)
{
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require base_path($routes[$uri]);
    } else {
        abort();
    }
}

$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToController($uri, $routes);
