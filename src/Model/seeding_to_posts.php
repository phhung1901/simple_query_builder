<?php
namespace src\Model;

require_once 'vendor/autoload.php';
require_once "./src/Config/Config.php";

use src\Config\Config;
use Faker\Factory;

$faker = Factory::create('vi_VN');

$query = "CREATE TABLE posts( 
  id   INT AUTO_INCREMENT,
  title  VARCHAR(100) NOT NULL,
  content TEXT NOT NULL,
  user_id INT NOT NULL , 
  PRIMARY KEY(id),
  FOREIGN KEY (user_id) REFERENCES users (id)
)";

Config::getInstance();
Config::simple_query($query);

for ($i = 0; $i < 100; $i++){
    $sql = 'INSERT INTO posts (title, content, user_id) VALUES (:title, :content, :user_id)';
    $stmt = Config::getInstance()->prepare($sql);
    $title = $faker->title();
    $content = $faker->realText();
    $user_id = $faker->numberBetween(1, 100);
    $stmt->execute([
        ':title' => $title,
        ':content' => $content,
        ':user_id' => $user_id
    ]);
}



