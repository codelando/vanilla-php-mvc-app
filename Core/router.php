<?php

namespace Core;
use Core\Response;

class Router 
{
    protected $routes = [];

    public function route($uri, $method) 
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require base_path($route['controller']);
            }
        }

        $this->abort();
    }

    public function add($method, $uri, $controller)
    {
        $this->routes[] = compact('uri', 'controller', 'method');
    } 

    public function get($uri, $controller) 
    {
        $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller) 
    {
        $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller) 
    {
        $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller) 
    {
        $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller) 
    {
        $this->add('PUT', $uri, $controller);
    }
    
    protected function abort($status = Response::NOT_FOUND) 
    { 
        http_response_code($status);
        
        $view = file_exists("views/{$status}.php") ? "views/{$status}.php" : "views/404.php";
        
        require base_path($view);
        
        die();
    }
}

