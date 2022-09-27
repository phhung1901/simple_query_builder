# Simple Query Builder package using PDO

Đề bài yêu cầu dCreate Query Builder is a simple, methods-chaining dependency-free library to create SQL Queries simple. Supports databases which are supported by PDO

#### Người thực hiện
Thực hiện bởi: ***Phạm Huy Hưng***

#### Sử dụng
***Cách sử dụng kết quả trực tiếp:***
- Download code và run code tại đường dẫn [https://github.com/phhung1901/simple_query_builder](https://github.com/phhung1901/simple_query_builder)
- Cài đặt `composer` và `PHP`
- Cài đặt FakerPHP qua composer: ***composer require fakerphp/faker***
- Tạo db với tên là: `db_query_builder`
- Chỉnh sửa thông tin connect PDO trong `src/Config/Config.php`
- Chạy seeding: run 2 file `seeding_to_posts.php` và  `seeding_to_users.php` để khởi tạo dữ liệu.\
- Chạy: $composer dump-autoload

***Required package:***
- `composer require phhung1901/simple_query_builder:dev-main`

***Nội dung:***
- Khai báo CSDL và connect with PDO: 
```php
<?php
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
?>
```

- Use simple_query_builder func 

```php
<?php
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
?>
```

#### Cấu trúc thư mục
- src
  - Config: PDO kết nối CSDL
  - interface: chứa các interface của dto
  - QueryBuilder: Class Query Builder, query method.
- test
  - Các file test và khởi tạo dữ liệu

#### Kết quả thu được
- Quản lý user và database với Adminer.
- Kết nối với databases sử dụng PDO.
- Sử dụng PDO để xây dựng 1 simple query builder theo đề bài. 
- Kết hợp với dto của bài trước [https://github.com/phhung1901/pdo](https://github.com/phhung1901/pdo) để tạo thành 1 package hoàn chỉnh.
