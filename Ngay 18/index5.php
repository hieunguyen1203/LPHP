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
        //lấy ra thời gian hiện tại
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $d = date("d/m/Y H:i:s");
        $d1 = date("d-m-Y H:i:s");
        $d2 = date("Y-m-d H:i:s");
        $d3 = date("Y-m-d");
        $d4 = date("H:i:s");
        echo "<br>";
        var_dump($d);
        echo "<br>";
        var_dump($d1);
        echo "<br>";
        var_dump($d2);
        echo "<br>";
        var_dump($d3);
        echo "<br>";
        var_dump($d4);
        //in ra thời gian hiện tại theo timestamp
        echo "<br>";
        $now  =time();
        echo "Thời gian hiện tại theo timestamp: $now";
    ?>
</body>
</html>