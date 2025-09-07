<?php

use Core\Session;

view('session/create.view.php', [
    'heading' => 'Login',
    'errors' => Session::getFlash('errors', []),
    'email' => old('email')
]);
