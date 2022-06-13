<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

echo "<pre>";
print_r($_POST);
echo "</pre>";

?>
<pre>
    get và post 
    get: submit dữ liệu xuất hiện trên url dưới dạng query string
        index1.php?ten_dang_nhap=abc&mat_khau=123&login=Đăng+nhập
        domain?key1=val1&key2=val2&key3=val3
    post: băm dữ liệu và ko nhìn thấy trên url nên nó bảo mật hơn
</pre>
<form name="user" action="" method="post">
    <div>
        <label for="">username</label>
        <input type="text" name="ten_dang_nhap" value="">
    </div>
    <div>
        <label for="">password</label>
        <input type="text" name="mat_khau" value="">
    </div>
    <input type="submit" name="login" value="Đăng nhập">
</form>
</body>
</html>
