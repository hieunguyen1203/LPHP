<?php

$file = fopen("data.txt", "r");
echo "<pre>";

while(!feof($file)) {
    echo fgets($file).PHP_EOL;
}
echo "</pre>";
fclose($file);
?>