<?php

namespace Core;

use Core\Response;

class Router
{
    private $routes = [];

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function delete($uri, $controller)
    {
        $this->routes['DELETE'][$uri] = $controller;
    }

    public function patch($uri, $controller)
    {
        $this->routes['PATCH'][$uri] = $controller;
    }

    public function put($uri, $controller)
    {
        $this->routes['PUT'][$uri] = $controller;
    }

    public function route($uri, $method)
    {

        $method = strtoupper($method);
        if (array_key_exists($method, $this->routes) && array_key_exists($uri, $this->routes[$method])) {
            require base_path($this->routes[$method][$uri]);
        } else {
            $this->abort();
        }
    }

    public function abort($code = Response::HTTP_NOT_FOUND)
    {
        http_response_code($code);

        require base_path("views/{$code}.php");

        die();
    }

}
