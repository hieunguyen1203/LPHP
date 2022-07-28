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
<form action="" method="post">

    <label for="email">Nhập email: <br></label>
    <input type="text" name="email" id="email" value="<?php echo (isset($_POST['email']) ? $_POST['email']:'') ?>"><br>

    <label for="phone">Nhập số điện thoại: <br></label>
    <input type="text" name="phone" id="phone" value="<?php echo (isset($_POST['phone']) ? $_POST['phone']:'') ?>"> <br>

    <label for="date">Nhập ngày tháng: <br></label>
    <input type="text" name="date" id="date" value="<?php echo (isset($_POST['date']) ? $_POST['date']:'') ?>"> <br>

    <label for="website">Nhập website</label><br>
    <input type="text" name="website" id="website" value="<?php echo (isset($_POST['website']) ? $_POST['website']:'') ?>"> <br>

    <input type="submit" name="submit" >
    <br>
    <br>
    <?php
    include_once 'classValidate.php';
    if(isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['date']) && isset($_POST['website'])) {
        $validate = new ValidateData($_POST['phone'], $_POST['email'], $_POST['website'], $_POST['date']);
        if(!$validate->validateDate()) {
            echo 'Ngày tháng không hợp lệ <br>';
        }
        else {
            echo 'Ngày tháng hợp lệ <br>';
        }
        if(!$validate->validatePhone()) {
            echo 'Số điện thoại không hợp lệ <br>';
        }
        else {
            echo 'Số điện thoại hợp lệ <br>';
        }
        if(!$validate->validateWebsite()) {
            echo 'Website không hợp lệ <br>';
        }
        else {
            echo 'Website hợp lệ <br>';
        }
        if(!$validate->validateEmail()) {
            echo 'Email không hợp lệ <br>';
        }
        else {
            echo 'Email hợp lệ <br>';
        }
    }
    else {
        echo 'Hay nhap du thong tin';
    }


    ?>
</form>
</body>
</html>
