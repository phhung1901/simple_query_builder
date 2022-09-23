<?php
namespace test;

require_once "./vendor/autoload.php";


use src\Config\Config;
use src\QueryBulder\QueryBuilder as DB;
use test\User;

$servername = "localhost";
$dbname = "db_query_builder";
$username = "root";
$password = "Phh1901@";

$config_val = [
    'host' => $servername,
    'dbname' => $dbname,
    'username' => $username,
    'password' => $password
];

$config = new Config($config_val);
$user = new \test\User();


//$result = DB::table("users")->select("name, phone")->get();
//$result = DB::table("users")->get();
//$result = DB::table("users")->first();
//$result = DB::table('users')->select('*')->where("id", ">=", "12")->get();
//$result = DB::table('users')->find(10);
//$result = DB::table("users")->select("name")->orderBy("id", "DESC")->get();
//$result = DB::table('users')->select("name")->count();
$result = DB::table('users')
    ->select("*, posts.id as post_id")
    ->join("posts", "users.id", "=", "posts.user_id")
//    ->limit(3)
            ->first();
//    ->get();



//print_r($result);
$user = $user->from($result);
print_r($user);
