<?php

$config = require 'config.php';
$db = new Database($config['database']);


$heading = 'Create Note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $body = $_POST['body'] ?? '';
    $db->query('insert into notes (body, user_id) values (:body, 1)', [
        'body' => $body
    ]);

}

require 'views/note-create.view.php';
