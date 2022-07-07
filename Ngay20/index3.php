<?php

setcookie("keyword", "Dien thoai", time() + 30 * 24 * 60 * 60);
setcookie("ten_nguoi_dung", "tuan anh", time() + 30 * 24 * 60 * 60);

echo "<pre>";
print_r($_COOKIE);

echo "</pre>";
echo "<br>In cookie: ". $_COOKIE['keyword'];
setcookie("username", "", time() - 1000);