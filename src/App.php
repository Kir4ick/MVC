<?php
namespace Src;
use Src\Router\Router;


//Класс для инициализации приложения, запускает роутинг
class App
{
    private static $init = false;

    public function __construct()
    {
        require_once 'routes.php';
        Self::init();
    }


    public static function guard(){
        if (Self::$init === false){
            http_response_code(501);
        }
    }

    public function init(){
        if (!Self::$init){
            Self::$init = true;
            $router = new Router();
            $router->run();
        }
    }
}
