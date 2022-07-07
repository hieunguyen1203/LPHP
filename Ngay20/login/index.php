<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
if(!isset($_SESSION['admin'])){

?>
<form action="login.php" method="post">
    USername <input type="text" value="" name="username"> <br/>
    Password <input type="text" value="" name="password">
    <input type="submit" value="Đăng nhập">
</form>
<?php
}
else{
    echo "Xin chào: ".$_SESSION['admin']['username']. "<br>Mật khẩu của bạn là: ".$_SESSION['admin']['password'];
    echo "<Br><a href='logout.php'>Đăng xuất</a>";
}
?>
</body>
</html>