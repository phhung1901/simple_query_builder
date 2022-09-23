<?php
namespace src\Config;

class Config{
    private static $servername;
    private static $dbname;
    private static $username;
    private static $password;

    private static $instance;

    public function __construct($servername, $dbname, $username, $password){
        self::$servername = $servername;
        self::$dbname = $dbname;
        self::$username = $username;
        self::$password = $password;
    }

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