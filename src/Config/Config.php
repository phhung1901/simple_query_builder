<?php
namespace src\Config;

class Config{
    private static $config = array();

    private static $instance;

    public function __construct(array $config){
        self::$config = $config;
    }

    public static function getInstance(){
        try {
            self::$instance = new \PDO("mysql:host=".self::$config['host'].";dbname=".self::$config['dbname'], self::$config['username'], self::$config['password']);
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