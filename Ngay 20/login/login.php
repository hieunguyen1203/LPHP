<?php
session_start();
$users = [
    ["username" => "admin", "password" => md5("123456")],
    ["username" => "tuananh", "password" => md5("abcdef")],
];
if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    if(strlen($_POST['username']) < 5 || strlen($_POST['password']) < 6) {
        echo "Tài khoản hoặc mật khẩu không hợp lệ";
        die();
    }
    else{
        foreach ($users as $user) {
            if($username == $user['username'] && $password == $user['password']){
                $_SESSION['admin'] = ['username' => $user['username'],
                    'password' => $_POST['password']];
                header("Location: index.php");
                exit();
            }
        }
        echo "Tài khoản hoặc mật khẩu khôgn đúng";
        die();
    }
}
else {
    echo "Tài khoản hoặc mật khẩukhông hợp lệ";
    die();
}