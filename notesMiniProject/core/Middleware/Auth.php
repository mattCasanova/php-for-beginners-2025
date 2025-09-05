<?php

namespace Core\Middleware;

class Auth implements Handler
{
    public function handle()
    {
        if (! $_SESSION['user'] ?? false) {
            header('Location: /');
            exit();
        }
    }
}
