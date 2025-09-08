<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\AuthForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new AuthForm();
$auth = new Authenticator();

if ($form->validate($email, $password) && $auth->attemptRegister($email, $password)) {
    redirect('/');
}

$formErrors = $form->getErrors();

Session::flash('errors', count($formErrors) ? $formErrors : $auth->getErrors());
Session::flash('old', [
    'email' => $email
]);

redirect('/register');
