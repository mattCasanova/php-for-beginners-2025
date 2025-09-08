<?php

use Core\Session;

view('registration/create.view.php', [
    'heading' => 'Register',
    'errors' => Session::getFlash('errors', []),
    'email' => old('email')
]);
