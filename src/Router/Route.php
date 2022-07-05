<?php

namespace Src\Router;
use Src\Contracts\Routing\Routing;

class Route implements Routing
{
    private static $api = [];

    private static $web = [];

    public static function post(string $uri, $function)
    {
        return ['uri' => $uri, 'function' => $function, 'method' => 'POST'];

    }

    public static function get(string $uri, $function)
    {
        return ['uri' => $uri, 'function' => $function, 'method' => 'GET'];
    }

    public static function put(string $uri, $function)
    {
        return ['uri' => $uri, 'function' => $function, 'method' => 'PUT'];
    }

    public static function patch(string $uri, $function)
    {
        return ['uri' => $uri, 'function' => $function, 'method' => 'PATCH'];
    }

    public static function delete(string $uri, $function)
    {
        return ['uri' => $uri, 'function' => $function, 'method' => 'DELETE'];
    }

    public static function getRoutes(){
        return [
            'api' => Self::$api,
            'web' => Self::$web
        ];
    }

    public static function redirect($uri){
        header('location: '.$uri);
    }

    public static function ApiGroup($function){
       array_push(Self::$api, call_user_func($function));
    }

    public static function WebGroup($function){
        array_push(Self::$web, call_user_func($function));
    }

    private function __construct(){}
    private function __clone(){}
}