<?php
namespace src\Config;

class Config{
    private static $servername = "localhost";
    private static $dbname = "db_query_builder";
    private static $username = "root";
    private static $password = "Phh1901@";

    private static $instance;

    private function __construct(){}

    public static function getInstance(){
        try {
            self::$instance = new \PDO("mysql:host=".self::$servername.";dbname=".self::$dbname, self::$username, self::$password);
            self::$instance->query('SET NAMES utf8');
            self::$instance->query('SET CHARACTER SET utf8');
        }catch (\Exception $exception){
            echo "Connect error\n";
        }
        return self::$instance;
    }

    public static function simple_query($query){
        if (is_object(self::$instance)){
            $query = self::$instance->query($query);
            $data = $query->fetchAll(\PDO::FETCH_OBJ);
            return $data;
        }else{
            throw new \Exception("PDO chua duoc khoi tao");
        }
    }
}