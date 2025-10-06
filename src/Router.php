<?php

namespace App\Router;

class Router
{
    static private $routes;

    public function __construct()
    {
        $this->routes = [];
    }

    public static function get(string $uri, array $callable): void
    {
        if(count($callable) < 2)
        {
            echo "Invalid arguments for route " . $uri;
            return;
        }
        
        self::$routes[$uri]["controller"] = $callable[0];
        self::$routes[$uri]["action"] = $callable[1];
    }

    public static function readRoutes()
    {
        $uri = $_SERVER["REQUEST_URI"];
        
        if(!isset(self::$routes[$uri]))
        {
            echo "No route found for " . $uri;
        }
        else
        {
            $controllerName = self::$routes[$uri]['controller'];
            $actionName = self::$routes[$uri]['action'];

            $controller = new $controllerName();
            $controller->$actionName();
        }
    }
}