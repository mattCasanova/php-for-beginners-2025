<?php

require 'functions.php';
//require 'router.php';

// connect to our MySQL database

$dsn = 'mysql:host=localhost;port=3306;dbname=myapp;user=root;charset=utf8mb4';

$pdo = new PDO($dsn, 'root');

$statement = $pdo->prepare("SELECT * FROM posts");
$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
    echo "<li>" . htmlspecialchars($post['title']). "</li>";
}
