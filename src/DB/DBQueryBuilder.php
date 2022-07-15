<?php

namespace Src\DB;
use Src\DB\DB;

class DBQueryBuilder
{
    protected $db;

    protected $sql;

    protected $table;

    protected $fillable;

    protected function __construct(DB $db)
    {
        $this->db = $db->connect();
    }

    public function create(array $data){
        $keys = implode(',', array_keys($data));
        $tags = ":".implode(', :', array_keys($data));
        $this->data = $data;
        $this->sql = "INSERT INTO {$this->table} ($keys) VALUES ($tags)";

        return $this;
    }

    public function prepare(){

    }


}