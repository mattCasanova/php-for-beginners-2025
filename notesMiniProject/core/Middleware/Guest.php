<?php

namespace Core\Middleware;

use Core\Session;

class Guest implements Handler
{
    public function handle()
    {
        if (Session::has('user')) {
            redirect('/');
            exit();
        }
    }
}
