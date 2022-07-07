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
        một số hàm xử lý chuỗi trong php
    </pre>
    <?php
    $a = "hà nội việt nam";

    //in ra độ dài của chuỗi
    echo strlen($a)."<br>";
    echo str_word_count($a)."<br>";
    ?>

    <?php 
    //thay thế chuỗi
    
    $b = "tôi thích uống cocacola";
    $c = "pepsi";
    echo "<br>".str_replace("cocacola", "pepsi", $b);
    
    ?>
</body>
</html>