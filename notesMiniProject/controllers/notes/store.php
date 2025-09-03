<?php

use Core\Database;
use Core\Validator;

$config = require base_path('config.php');
$db = new Database($config['database']);

$errors = [];
$body = $_POST['body'] ?? '';

if (! Validator::string($body, 1000)) {
    $errors['body'] = 'Body must be between 1 and 1000 characters';
    return view('notes/create.view.php', [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}

// No errors, store in the database
$db->query('insert into notes (body, user_id) values (:body, 1)', [
    'body' => $body
]);
// Redirect to the notes index page
header('Location: /notes');
