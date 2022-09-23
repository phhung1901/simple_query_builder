<?php
namespace test;

require_once 'vendor/autoload.php';
require_once "./src/Config/Config.php";

use src\Config\Config;
use Faker\Factory;

$faker = Factory::create('vi_VN');

$query = "CREATE TABLE users( 
  id   INT AUTO_INCREMENT,
  name  VARCHAR(100) NOT NULL, 
  phone VARCHAR(50) NULL, 
  PRIMARY KEY(id)
)";

Config::getInstance();
Config::simple_query($query);

for ($i = 0; $i < 100; $i++){
    $sql = 'INSERT INTO users (name, phone) VALUES (:name, :phone)';
    $stmt = Config::getInstance()->prepare($sql);
    $name = $faker->name();
    $phone = $faker->phoneNumber();
    $stmt->execute([
       ':name' => $name,
       ':phone' => $phone
    ]);
}



