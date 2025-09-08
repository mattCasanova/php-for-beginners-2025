<?php

use Core\Authenticator;
use Http\Forms\AuthForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = AuthForm::validate($email, $password);
$auth = new Authenticator();

if (! $auth->attemptRegister($email, $password)) {
    $form->addErrors($auth->getErrors())->throw();
}

redirect('/');
