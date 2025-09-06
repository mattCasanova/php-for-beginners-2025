<?php

use Core\Middleware\Type;

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

// Notes
$router->get('/notes', 'notes/index.php')->only(Type::AUTH);
$router->get('/note', 'notes/show.php')->only(Type::AUTH);
$router->get('/notes/create', 'notes/create.php')->only(Type::AUTH);

$router->get('/notes/edit', 'notes/edit.php')->only(Type::AUTH);
$router->patch('/note', 'notes/update.php')->only(Type::AUTH);

$router->delete('/note', 'notes/destroy.php')->only(Type::AUTH);
$router->post('/notes', 'notes/store.php')->only(Type::AUTH);

$router->get('/register', 'registration/create.php')->only(Type::GUEST);
$router->post('/register', 'registration/store.php')->only(Type::GUEST);

$router->get('/login', 'session/create.php')->only(Type::GUEST);
$router->post('/session', 'session/store.php')->only(Type::GUEST);
$router->delete('/session', 'session/destroy.php')->only(Type::AUTH);
