<?php

use Core\App;
use Core\Database;
use Core\Validator;

$currentUserId = 1;

//find the note
$note = App::resolve(
    Database::class
)->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

// authorize that the current user owns the note
authorize($note['user_id'] === $currentUserId);

// validate the from
$errors = [];
$body = $_POST['body'] ?? '';
if (! Validator::string($body, 1000)) {
    $errors['body'] = 'Body must be between 1 and 1000 characters';
    return view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

// if are no errors, update the note in the database
App::resolve(
    Database::class
)->query('update notes set body = :body where id = :id', [
    'body' => $body,
    'id' => $note['id']
]);
// redirect to the note show page
header('Location: /note?id=' . $note['id']);
