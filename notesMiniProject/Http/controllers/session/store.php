<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();
$auth = new Authenticator();

if ($form->validate($email, $password) && $auth->attempt($email, $password)) {
    redirect('/');
}

$formErrors = $form->getErrors();
view('session/create.view.php', [
    'heading' => 'Log In',
    'errors' => count($formErrors) ? $formErrors : $auth->getErrors()

]);
