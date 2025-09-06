<?php

use Core\Middleware\Type;

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

// Notes
$router->get('/notes', 'controllers/notes/index.php')->only(Type::AUTH);
$router->get('/note', 'controllers/notes/show.php')->only(Type::AUTH);
$router->get('/notes/create', 'controllers/notes/create.php')->only(Type::AUTH);

$router->get('/notes/edit', 'controllers/notes/edit.php')->only(Type::AUTH);
$router->patch('/note', 'controllers/notes/update.php')->only(Type::AUTH);

$router->delete('/note', 'controllers/notes/destroy.php')->only(Type::AUTH);
$router->post('/notes', 'controllers/notes/store.php')->only(Type::AUTH);

$router->get('/register', 'controllers/registration/create.php')->only(Type::GUEST);
$router->post('/register', 'controllers/registration/store.php')->only(Type::GUEST);

$router->get('/login', 'controllers/session/create.php')->only(Type::GUEST);
$router->post('/session', 'controllers/session/store.php')->only(Type::GUEST);
$router->delete('/session', 'controllers/session/destroy.php')->only(Type::AUTH);
