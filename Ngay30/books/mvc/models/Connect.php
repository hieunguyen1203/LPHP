<?php
namespace MVC\Models;

use Exception;
use PDO;

class Connect {

    public PDO $pdo;

    public function __construct()
    {
        $host = 'localhost';
        $dbname = 'bookdb';
        $user = 'root';
        $password = '';

        try {
            $dsn = "mysql:host=$host;dbname=$dbname;charset=UTF8";
            $this->pdo = new PDO($dsn, $user, $password);
            if ($this->pdo) {
                //echo 'Kết nối thành công!';
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}