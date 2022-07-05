<?php

namespace Src\Router;

use Src\Router\Route;
use Src\Contracts\Routing\Router AS Rout;

class Router implements Rout
{

    private $routes;

    public function __construct()
    {
        $this->routes = Route::getRoutes();
    }

    public function run():void
    {
        foreach ($this->routes as $method => $value){
            if($method == 'api'){
                header("Access-Control-Allow-Origin: *");
                header("Content-Type: application/json; charset=UTF-8");
                $this->action($value[0]);
            }else{
                header('Content-type: text/html');
                $this->action($value[0]);
            }
        }
        http_response_code(404);
    }

    private function action($routes){
        foreach ($routes as $route){
            if(count($route) == 0){
                continue;
            }
            if($this->valid($route)){
                call_user_func($route['function']);
                exit();
            }
        }
    }

    private function valid(array $route):bool{

        return preg_match('~'.$route['uri'].'(?![a-z])'.'~','~/'.$_SERVER['REQUEST_URI'].'~') &&
            $route['method'] == $_SERVER['REQUEST_METHOD'];
    }
}