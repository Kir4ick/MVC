<?php

namespace Src\View;

class View
{
    private static $temp = 'views/templates/';

    private $file;

    public function __construct($name)
    {
        $this->file = Self::$temp.$name.'.php';
        require_once $this->file;
    }

    public static function getBlock($name){
        require Self::$temp.$name.'.php';
    }


}