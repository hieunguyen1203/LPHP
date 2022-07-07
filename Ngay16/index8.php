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
    $a = "hà nội";
    //cách 1
    echo "<p>".$a."</p>";

    //cách 2 chính là biến nội suy
    echo "<p>$a</p>";

    //nếu viết tên biến trong nháy đơn thì php sẽ hiểu đó là một chuỗi
    echo '<p>$a</p>';
    ?>
</body>
</html>