<?php
namespace test;

require_once "./src/Config/Config.php";
require_once "./src/QueryBuilder/QueryBuilder.php";

use src\Config\Config;
use src\QueryBulder\QueryBuilder as DB;


//$result = DB::table("users")->select("name, phone")->get();
//$result = DB::table("users")->get();
$result = DB::table("users")->first();
print_r($result);


