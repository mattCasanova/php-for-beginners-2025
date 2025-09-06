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

function login($user)
{
    // mark the user as logged in
    $_SESSION['user'] = [
        'email' => $user['email'],
    ];

    // Regenerate the session ID to prevent session fixation attacks
    session_regenerate_id(true);
}

function logout()
{
    $_SESSION = [];
    session_destroy();

    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);

}
