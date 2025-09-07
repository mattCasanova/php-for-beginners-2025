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
if (! Validator::string($password, 255, 7)) {
    $errors['password'] = 'Password must be between 7 and 255 characters';
}

if (count($errors)) {
    return view('registration/create.view.php', [
        'heading' => 'Register',
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);
// Check if the user already exists
$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    redirect('/');
}

// Insert the new user into the database
$user = $db->query('insert into users (email, password) values (:email, :password)', [
    'email' => $email,
    'password' => password_hash($password, PASSWORD_BCRYPT)
]);

dd($user);

login([
    'email' => $email
]);

redirect('/');
