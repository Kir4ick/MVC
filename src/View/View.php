<?php

namespace Src\View;

use Src\Contracts\Response;

class View implements Response
{
    private static $temp = 'views/templates/';

    private $file;

    public function __construct($name)
    {
        $this->file = Self::$temp.$name.'.php';
    }

    public static function getBlock($name){
        require Self::$temp.$name.'.php';
    }

    public function init()
    {
        require_once $this->file;
    }

}