<?php
namespace src\QueryBulder;

require_once "./src/Config/Config.php";
require_once "./src/Interfaces/QueryBuilderInterface.php";

use src\Config\Config;
use src\interfaces\QueryBuilderInterface;

class QueryBuilder implements QueryBuilderInterface {
    public $query;

    public static $table;

    public function __construct(){
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

    public function where()
    {
        // TODO: Implement where() method.
    }

    public function find()
    {
        // TODO: Implement find() method.
    }

    public function orderBy($param)
    {
        // TODO: Implement orderBy() method.
    }

    public function count()
    {
        // TODO: Implement count() method.
    }

    public function join()
    {
        // TODO: Implement join() method.
    }
}