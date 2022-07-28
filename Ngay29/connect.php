<?php
$host = 'localhost';
$dbname = 'bookdb';
$user = 'root';
$password = '';

try {

    $dsn = 'mysql:host=localhost;dbname='.$dbname.';charset=UTF8';
    $pdo = new PDO($dsn, $user,
        $password);
    if($pdo) {
        //echo 'Kết nối thành công!';
    }
}
catch (Exception $e) {
    echo $e->getMessage();
}