<?php

namespace Src\DB;

class DB
{
    private $config;

    public function __construct()
    {
        $this->config = require_once('../../config/bdconfig.php');
    }

    public function connect(){
        return new \PDO($this->config['db_type'].':host='. $this->config['host'] . ';dbname=' . $this->config['db_name'], $this->config['db_user'], $this->config['db_pass']);
    }
}