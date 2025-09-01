<?php

$config = require 'config.php';
$db = new Database($config['database']);


$heading = 'Create Note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    $body = $_POST['body'] ?? '';
    $length = strlen($body);


    if ($length === 0) {
        $errors['body'] = 'A body is required';
    } elseif ($length > 1000) {
        $errors['body'] = 'Body cannot be longer than 1000 characters';
    }

    if (empty($errors)) {
        $db->query('insert into notes (body, user_id) values (:body, 1)', [
            'body' => $body
        ]);
    }
}

require 'views/note-create.view.php';
