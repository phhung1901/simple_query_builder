<?php
namespace src\interfaces;

interface QueryBuilderInterface{
    public static function table($table);

    public function first();

    public function where($param, $param2, $param3);

    public function find($id);

    public function orderBy($column, $param);

    public function count();

    public function join($reference_table, $foreign_key, $operator, $reference_key);

    public function select($item);

    public function get();

    public function limit($param);

}