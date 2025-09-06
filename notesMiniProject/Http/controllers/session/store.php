<?php

use Core\App;
use Core\Database;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

// validate the form inputs
$form = new LoginForm();

if (! $form->validate($email, $password)) {
    return view('session/create.view.php', [
        'heading' => 'Log In',
        'errors' => $form->getErrors()
    ]);
}

$db = App::resolve(Database::class);
// Check if the user exists
$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if (! $user || ! password_verify($password, $user['password'])) {
    $errors['email'] = 'No user with that email address or the password is incorrect';
    return view('session/create.view.php', [
        'heading' => 'Log In',
        'errors' => $errors
    ]);
}

login([
    'email' => $email
]);

header('Location: /');
exit();
