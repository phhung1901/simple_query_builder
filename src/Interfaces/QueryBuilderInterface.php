<?php
namespace src\interfaces;

interface QueryBuilderInterface{
    public static function table($table);

    public function select($item);

    public function get();

}