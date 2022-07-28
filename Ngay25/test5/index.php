<?php
include_once 'classDateTimeHelper.php';
$d = new DateTimeHelper('Asia/Ho_Chi_Minh','H:i:s d/m/Y');
echo $d->now();
echo '<br>';
$d->toTimestamp('12:12:00 12/7/2021');

