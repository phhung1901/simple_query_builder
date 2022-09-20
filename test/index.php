<?php
namespace test;

require_once "./src/Config/Config.php";
require_once "./src/QueryBuilder/QueryBuilder.php";

use src\Config\Config;
use src\QueryBulder\QueryBuilder as DB;


$result = DB::table("users")->select("name, phone")->get();
//$result = DB::table("users")->get();
//$result = DB::table("users")->first();
//$result = DB::table('users')->select('*')->where("id", ">=", "12")->get();
//$result = DB::table('users')->find(10);
//$result = DB::table("users")->select("name")->orderBy("id", "DESC")->get();
//$result = DB::table('users')->select("name")->count();
$result = DB::table('users')
            ->select("*, posts.id as post_id")
            ->join("posts", "users.id", "=", "posts.user_id")
            ->limit(3)
//            ->first();
            ->get();
print_r($result);


