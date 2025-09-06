<?php

namespace Core;

use Core\Response;
use Core\Middleware\Middleware;
use Core\Middleware\Type;

class Router
{
    private $routes = [];
    private $lastMethod = null;
    private $lastUri = null;

    public function get($uri, $controller)
    {
        $this->add('GET', $uri, $controller);
        return $this;
    }

    public function post($uri, $controller)
    {
        $this->add('POST', $uri, $controller);
        return $this;
    }

    public function delete($uri, $controller)
    {
        $this->add('DELETE', $uri, $controller);
        return $this;
    }

    public function patch($uri, $controller)
    {
        $this->add('PATCH', $uri, $controller);
        return $this;
    }

    public function put($uri, $controller)
    {
        $this->add('PUT', $uri, $controller);
        return $this;
    }

    public function only(Type $type)
    {
        if ($this->lastMethod && $this->lastUri) {
            $this->routes[$this->lastMethod][$this->lastUri]['middleware'] = $type;
        }
        return $this;
    }

    public function route($uri, $method)
    {
        $method = strtoupper($method);
        if (!array_key_exists($method, $this->routes) || !array_key_exists($uri, $this->routes[$method])) {
            $this->abort();
            return $this;
        }

        $route = $this->routes[$method][$uri];

        Middleware::resolve($route['middleware'])->handle();
        require base_path('Http/controllers/' . $route['controller']);
    }

    public function abort($code = Response::HTTP_NOT_FOUND)
    {
        http_response_code($code);

        require base_path("views/{$code}.php");

        die();
    }

    public function add($method, $uri, $controller)
    {
        $method = strtoupper($method);
        $this->routes[$method][$uri] = [
            'controller' => $controller,
            'middleware' => Type::NULL,
        ];
        $this->lastMethod = $method;
        $this->lastUri = $uri;
        return $this;
    }

}
