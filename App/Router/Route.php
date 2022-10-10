<?php

namespace App\Router;

class Route
{
    static private $instance = null;
    static private $routes;
    static private $GET = [];
    static private $POST = [];
    static private $PATCH = [];
    static private $DELETE = [];

    static public function get($resource, $action, $controllerAction)
    {
        self::$GET[] = [$resource, $action, $controllerAction];
        if (is_null(self::$instance)) {
            new self;
        }
    }

    static public function post($resource, $action, $controllerAction)
    {
        self::$POST[] = [$resource, $action, $controllerAction];
        if (is_null(self::$instance)) {
            new self;
        }
    }

    static public function patch($resource, $action, $controllerAction)
    {
        self::$PATCH[] = [$resource, $action, $controllerAction];
        if (is_null(self::$instance)) {
            new self;
        }
    }

    static public function delete($resource, $action, $controllerAction)
    {
        self::$DELETE[] = [$resource, $action, $controllerAction];
        if (is_null(self::$instance)) {
            new self;
        }
    }

    static public function take()
    {
        return self::$instance;
    }

    public function run($router)
    {
        $routes = self::${$router->queryType};
        foreach ($routes as $route) {
            if(
                $route[0] == $router->resource
                &&
                $route[1] == $router->action
            ){
                $router->controllerAction = $route[2];
            }
        }
    }

    private function __construct()
    {
        self::$instance = $this;
    }
}