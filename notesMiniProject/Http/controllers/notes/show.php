<?php

use Core\App;
use Core\Database;

$currentUserId = 1;

$note = App::resolve(
    Database::class
)->query('select * from notes where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view('notes/show.view.php', [
    'heading' => 'Notes',
    'note' => $note
]);
