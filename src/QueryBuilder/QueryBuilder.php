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
        $this->query = "SELECT ".$item."FROM ".self::$table;
        return $this;
    }

    public function get()
    {
        // TODO: Implement get() method.
        return Config::simple_query($this->query);
    }
}