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
        foreach ($this->routes as $key => $route){
            if(count($route) == 0){
                continue;
            }
            if($this->valid($route, $key)){
                call_user_func($route['function']);
            }else{
                http_response_code(404);
            }
        }
    }



    private function valid(array $route, string $key):bool{
        return preg_match('~'.$route['uri'].'~','~/'.$_SERVER['REQUEST_URI'].'~') && $key == $_SERVER['REQUEST_METHOD'];
    }

    public static function redirect($uri){
        header($uri);
    }
}