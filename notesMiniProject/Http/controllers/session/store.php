<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();
$auth = new Authenticator();

if ($form->validate($email, $password) && $auth->attempt($email, $password)) {
    redirect('/');
}
$formErrors = $form->getErrors();

Session::flash('errors', count($formErrors) ? $formErrors : $auth->getErrors());
Session::flash('old', [
    'email' => $email
]);

redirect('/login');
