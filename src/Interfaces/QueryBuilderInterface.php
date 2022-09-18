<?php
namespace src\interfaces;

interface QueryBuilderInterface{
    public static function table($table);

    public function first();

    public function where();

    public function find();

    public function orderBy($param);

    public function count();

    public function join();

    public function select($item);

    public function get();

}