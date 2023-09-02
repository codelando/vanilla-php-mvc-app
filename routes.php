<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/register', 'controllers/register/create.php')->only('guest');
$router->post('/register', 'controllers/register/store.php');

$router->get('/notes', 'controllers/notes/index.php')->only('auth');
$router->get('/note', 'controllers/notes/show.php')->only('auth');
$router->delete('/notes', 'controllers/notes/destroy.php')->only('auth');

$router->get('/notes/create', 'controllers/notes/create.php')->only('auth');
$router->get('/notes/edit', 'controllers/notes/edit.php')->only('auth');
$router->patch('/note', 'controllers/notes/update.php')->only('auth');


$router->post('/notes', 'controllers/notes/store.php');
