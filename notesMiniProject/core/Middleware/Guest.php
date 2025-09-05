<?php

namespace Core\Middleware;

class Guest implements Handler
{
    public function handle()
    {
        if (isset($_SESSION['user'])) {
            header('Location: /');
            exit();
        }
    }
}
