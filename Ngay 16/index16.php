<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre>
        vòng lặp trong php
        for, while, do while giống trong js
        break giống trong js
        continue giống trong js
    </pre>
    <?php 
    $a = 5;
    $b = 25;
    //In ra tổng các số tử $a đến $b
    $tong = 0;
    for($i  = $a; $i <= $b; $i++) {
        $tong += $i;
    }
    echo 'Tổng là: '.$tong."<br>";
    //In ra tích các số tử $a đến $b
    $tich = 1;
    for($j = $a; $j <= $b; $j++ ){
        $tich *= $j;
    }
    echo 'Tích là: '.$tich."<br>";
    ?>
</body>
</html>