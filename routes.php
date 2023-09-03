<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

$router->get('/login', 'sessions/create.php')->only('guest');
$router->post('/sessions', 'sessions/store.php')->only('guest');
$router->delete('/sessions', 'sessions/destroy.php')->only('auth');

$router->get('/register', 'register/create.php')->only('guest');
$router->post('/register', 'register/store.php')->only('guest');

$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/note', 'notes/show.php')->only('auth');

$router->get('/notes/create', 'notes/create.php')->only('auth');
$router->patch('/note', 'notes/update.php')->only('auth');

$router->get('/notes/edit', 'notes/edit.php')->only('auth');
$router->post('/notes', 'notes/store.php')->only('auth');

$router->delete('/notes', 'notes/destroy.php')->only('auth');