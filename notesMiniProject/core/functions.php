<?php

use Core\Response;

function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}



function urlIs($url)
{
    return $_SERVER['REQUEST_URI'] === $url;
}

function authorize(bool $condition, int $statusCode = Response::HTTP_FORBIDDEN)
{
    if (! $condition) {
        abort($statusCode);
    }
}

function base_path(string $path): string
{
    return BASE_PATH . $path;
}

function view(string $viewPath, array $attributes = [])
{
    extract($attributes);
    require base_path("views/{$viewPath}");
}
