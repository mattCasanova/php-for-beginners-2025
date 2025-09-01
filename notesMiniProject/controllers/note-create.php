<?php

require 'Validator.php';

$config = require 'config.php';
$db = new Database($config['database']);


$heading = 'Create Note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
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

require 'views/note-create.view.php';
