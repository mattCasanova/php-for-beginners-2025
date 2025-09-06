<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

// validate the form inputs
$errors = [];
if (! Validator::email($email)) {
    $errors['email'] = 'Email must be a valid email address';
}
if (! Validator::string($password)) {
    $errors['password'] = 'Please provide a valid password';
}

if (count($errors)) {
    return view('session/create.view.php', [
        'heading' => 'Log In',
        'errors' => $errors
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
