<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "Core/functions.php";

spl_autoload_register(function ($class) {
    
    $class = str_replace('\\', '/', $class);
    
    require base_path("{$class}.php");
});

$router = new \Core\Router();

require base_path('routes.php');
require base_path('bootstrap.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

session_start();

$router->route($uri, $method);
