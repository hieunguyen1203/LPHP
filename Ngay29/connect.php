<?php
$host = 'localhost';
$dbname = 'bookdb';
$user = 'root';
$password = '';

try {
    $conn = new PDO('mysql:host=localhost;dbname='.$dbname, $user,
        $password);
    if($conn) {
        echo 'Kết nối thành công!';
    }
}
catch (Exception $e) {
    echo $e->getMessage();
}