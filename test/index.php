<?php
namespace test;

require_once "./src/Config/Config.php";
require_once "./src/QueryBuilder/QueryBuilder.php";

use src\Config\Config;
//use src\QueryBulder\QueryBuilder;
use src\QueryBulder\QueryBuilder as DB;

$query_builder = new DB();
$result = DB::table("users")->select("*")->get();
print_r($result);
