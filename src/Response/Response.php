<?php

namespace Src\Response;
use Src\ArrayParse;
use Src\Contracts\Response AS Resp;

class Response implements Resp
{
    private $data;
    private $code;

    public function __construct(array $data, int $resp_code = 200)
    {
        $this->data = $data;
        $this->code = $resp_code;
    }

    public function init(){
        echo json_encode($this->data);
        http_response_code($this->code);
    }
}