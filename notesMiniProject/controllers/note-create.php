<?php

$heading = 'Create Note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $body = $_POST['body'] ?? '';

}

require 'views/note-create.view.php';
