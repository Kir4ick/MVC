<?php

namespace Src\Exceptions;

use Src\Contracts\Response;
use Src\View\View;

class Ex404 implements Response
{
    private $page;

    public function __construct()
    {
        $this->page =  new View('404');
    }

    public function init()
    {
        http_response_code(404);
        $this->page->init();
    }
}