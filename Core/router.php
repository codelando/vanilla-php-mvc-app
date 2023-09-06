<?php

namespace Core;

use Core\Response;
use Core\Middleware\Middleware;


class Router 
{
    protected $routes = [];

    public function add($method, $uri, $controller, $middleware = null)
    {
        $this->routes[] = [
            'uri' => $uri, 
            'controller' => $controller, 
            'method' => $method,
            'middleware' => $middleware
        ];

        return $this;
    } 

    public function get($uri, $controller) 
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller) 
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller) 
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller) 
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller) 
    {
        return $this->add('PUT', $uri, $controller);
    }

    public function only($key) {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }


    public function route($uri, $method) 
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                Middleware::resolve($route['middleware']);

                return require base_path("Http/controllers/{$route['controller']}");
            }
        }

        $this->abort();
    }


    public function previousUrl() 
    {
        return $_SERVER['HTTP_REFERER'];
    }

    protected function abort($status = Response::NOT_FOUND) 
    { 
        http_response_code($status);
        
        $view = file_exists("views/{$status}.php") ? "views/{$status}.php" : "views/404.php";
        
        require base_path($view);
        
        die();
    }
 }

