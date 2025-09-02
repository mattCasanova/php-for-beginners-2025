<?php

$config = require base_path('config.php');
$db = new Database($config['database']);

$errors = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $body = $_POST['body'] ?? '';

    if (! Validator::string($body, 1000)) {
        $errors['body'] = 'Body must be between 1 and 1000 characters';
    }

    if (empty($errors)) {
        $db->query('insert into notes (body, user_id) values (:body, 1)', [
            'body' => $body
        ]);
    }
}

view('notes/create.view.php', [
    'heading' => 'Create Note',
    'errors' => $errors
]);
