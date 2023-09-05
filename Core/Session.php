<?php

namespace Core;

class Session {
    public static function has($key) 
    {
        // The get method already returns a truthy / falsy value, so we just turn it into a boolean
        return (bool) static::get($key);
    }

    public static function get($key, $default = null) 
    {
        return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? $default;
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function unset($key)
    {
        unset($_SESSION[$key]);
    }

    public static function flash($key, $value)
    {
        $_SESSION['_flash'][$key] = $value;
    }

    public static function unflash($key, $value)
    {
        unset($_SESSION['_flash']);
    }

    public static function flush() 
    {
        $_SESSION = [];
    }
    
    public static function destroy() 
    {
        static::flush();
        session_destroy();
    
        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}