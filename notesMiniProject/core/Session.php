<?php

namespace Core;

class Session
{

    public static function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    public static function put(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function get(string $key, $default = null): mixed
    {
        return $_SESSION[$key] ?? $default;
    }

    public static function remove(string $key): void
    {
        unset($_SESSION[$key]);
    }

    public static function flush(): void
    {
        $_SESSION = [];
    }

    public static function destroy(): void
    {
        self::flush();
        session_destroy();

        // Also delete the session cookie
        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);

    }

    public static function flash(string $key, $value = null): void
    {
        $_SESSION['_flash'][$key] = $value;
    }

    public static function getFlash(string $key, $default = null): mixed
    {
        if (! isset($_SESSION['_flash'][$key])) {
            return $default;
        }

        return $_SESSION['_flash'][$key];
    }

    public static function unflash(): void
    {
        unset($_SESSION['_flash']);
    }
}
