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
include_once 'classCookieHelper.php';
$cookie = new CookieHelper('test_cookie');
$cookie->createCookie(['phan tu 1', 'phan tu 2', 'phan tu 3']);
echo 'getCookie():<br>';
echo $cookie->getCookie();
echo '<br>getAllCookie():<br>';
echo CookieHelper::getAllCookie();
?>
</body>
</html>
