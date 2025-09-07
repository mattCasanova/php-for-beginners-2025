<?php

namespace Core\Middleware;

use Core\Session;

class Auth implements Handler
{
    public function handle()
    {
        if (! Session::has('user')) {
            redirect('/');
            exit();
        }
    }
}
