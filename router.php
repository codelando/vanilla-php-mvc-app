<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [ 
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/notes' => 'controllers/notes.php',
    '/note' => 'controllers/note.php',
    '/contact' => 'controllers/contact.php'
];

function abort($code = 404) { 
    http_response_code($code);

    $view = file_exists("views/{$code}.php") ? "views/{$code}.php" : "views/404.php";
    require $view;

    die();
}

function routeToController($uri, $routes) {    
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

routeToController($uri, $routes);