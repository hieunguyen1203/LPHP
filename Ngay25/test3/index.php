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
    include_once 'class.Image.php';
    $image1 = new Image("https://znews-photo.zingcdn.me/w960/Uploaded/bzqvpdlu/2022_05_29/fef75c18b44d76132f5c.jpg", "noi dung the alt", 300, 100);
    echo $image1->render();
?>
</body>
</html>
