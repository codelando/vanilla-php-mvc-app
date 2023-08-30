<?php

use Core\Response;

function routeToController($uri, $routes) {    
    if (array_key_exists($uri, $routes)) {
        require base_path($routes[$uri]);
    } else {
        abort();
    }
}

function abort($status = Response::NOT_FOUND) { 
    http_response_code($status);
    
    $view = file_exists("views/{$status}.php") ? "views/{$status}.php" : "views/404.php";
    require base_path($view);
    
    die();
}

$routes = require base_path("routes.php");
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToController($uri, $routes);