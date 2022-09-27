<?php
namespace src\QueryBuilder;


use src\Config\Config;

class QueryBuilder{
    private $query;

    private static $table;

    private $operator = ["=", ">", "<", ">=", "<="];

    private function __construct(){
        Config::getInstance();
    }

    public static function table($table)
    {
        // TODO: Implement table() method.
        self::$table = $table;
        $static = new static();
        return $static;
    }

    public function select($item)
    {
        // TODO: Implement select() method.
        $this->query = "SELECT ".$item." FROM ".self::$table;
        return $this;
    }

    public function get()
    {
        // TODO: Implement get() method.
        if ($this->query == ""){
            $query = "SELECT * FROM ".self::$table;
            return Config::simple_query($query);
        }else{
            return Config::simple_query($this->query);
        }
    }

    public function first()
    {
        // TODO: Implement first() method.
        $this->query = "SELECT * FROM ".self::$table." ORDER BY id LIMIT 1";
        return Config::simple_query($this->query);
    }

    public function where($param1, $param2, $param3)
    {
        // TODO: Implement where() method.
        foreach ($this->operator as $item){
            if ($item == $param2){
                $this->query .= " WHERE ".$param1." ".$param2." ".$param3;
                return $this;
            }
        }
        $this->query .= " WHERE ".$param1." "."="." ".$param3;
        return $this;
    }

    public function find($id)
    {
        // TODO: Implement find() method.
        $this->query = "SELECT * FROM ".self::$table." WHERE id = ".$id;
        return Config::simple_query($this->query);

    }

    public function orderBy($column, $param = "")
    {
        // TODO: Implement orderBy() method.
        $param = $param ?: "ASC";
        if ($param == "ASC" || $param = "DESC"){
            $this->query .= " ORDER BY ".$column." ".$param;
            return $this;
        }
        return $this;
    }

    public function count()
    {
        // TODO: Implement count() method.
        return count($this->get());
    }

    public function join($reference_table, $foreign_key, $operator, $reference_key)
    {
        // TODO: Implement join() method.
        foreach ($this->operator as $item){
            if ($item == $operator){
                $this->query .= " JOIN ".$reference_table." ON ".$foreign_key." ".$operator." ".$reference_key;
                return $this;
            }
        }
        return false;
    }

    public function limit($param)
    {
        // TODO: Implement limit() method.
        $this->query .= " LIMIT ".$param;
        return $this;
    }
}