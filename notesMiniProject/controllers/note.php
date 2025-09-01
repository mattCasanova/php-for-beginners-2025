<?php

$config = require 'config.php';
$db = new Database($config['database']);

$heading = 'Notes';
$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
])->fetch();

if (! $note) {
    abort(Response::HTTP_NOT_FOUND);
} elseif ($note['user_id'] != $currentUserId) {
    abort(Response::HTTP_FORBIDDEN);
}

require 'views/note.view.php';
