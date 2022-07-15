<?php

namespace Src\Router;

use Src\Exceptions\Ex404;
use Src\Router\Route;
use Src\Contracts\Routing\Router AS Rout;

class Router implements Rout
{

    private $routes;

    //Забираем все роуты
    public function __construct()
    {
        $this->routes = Route::getRoutes();
    }

    //Узнаем тип запроса, кидаем заголовки и возвращаем объект
    public function run()
    {
        foreach ($this->routes as $method => $value) {
            if ($method == 'api') {
                header("Access-Control-Allow-Origin: *");
                header("Content-Type: application/json; charset=UTF-8");
            } else {
                header('Content-type: text/html');
            }
            $action =  $this->action($value[0]);
            if($action !== false){
                return $action;
            }
        }
        return new Ex404();
    }

    //Запускаем функцию
    private function action($routes){
        foreach ($routes as $route){
            if($this->valid($route)){
                $parametres = $this->getParametres($route['uri']);
                if($parametres !== false){
                    return call_user_func_array($route['function'], $parametres);
                }
                return call_user_func($route['function']);
            }
        }
        return false;
    }

    //Проверяем метод по которому пришел запрос и урл
    private function valid(array $route):bool{
        return preg_match('#^'.$route['uri'].'$#',$_SERVER['REQUEST_URI']) &&
            $route['method'] == $_SERVER['REQUEST_METHOD'];
    }

    //Если есть регулярки, то мы забираем значения в них
    private function getParametres(string $uri){
        //Проверка на скобки
        if(preg_match('#\(#','#^'.$uri.'$#')){
            $match = [];
            //Проверяем регулярку и кидаем
            preg_match('#^'.$uri.'$#',$_SERVER['REQUEST_URI'], $matches);
            //Перебираем массив совпадений регулярок
            for ($i = 1; $i < count($matches); $i++){
                $match[] = $matches[$i];
            }
            return $match;
        }
        return false;
    }
}