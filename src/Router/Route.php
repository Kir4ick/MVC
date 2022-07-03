<?php

namespace Src\Router;
use Src\Contracts\Routing\Routing;

class Route implements Routing
{
    private static $routes = [
        'POST' => [],
        'GET' => [],
        'PUT' => [],
        'DELETE' => [],
        'PATCH' => []
    ];

    public static function post(string $uri, $function)
    {
        Self::$routes['POST'] = ['uri' => $uri, 'function' => $function];
    }

    public static function get(string $uri, $function)
    {
        Self::$routes['GET'] = ['uri' => $uri, 'function' => $function];
    }

    public static function put(string $uri, $function)
    {
        Self::$routes['PUT'] = ['uri' => $uri, 'function' => $function];
    }

    public static function patch(string $uri, $function)
    {
        Self::$routes['PATCH'] = ['uri' => $uri, 'function' => $function];
    }

    public static function delete(string $uri, $function)
    {
        Self::$routes['DELETE'] = ['uri' => $uri, 'function' => $function];
    }


    public static function getRoutes(){
        return Self::$routes;
    }

    private function __construct(){}
    private function __clone(){}
}