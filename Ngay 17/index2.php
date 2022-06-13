<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
table, th, td {
  border:1px solid black;
}
</style>
</head>
<body>
    <?php
    $col = 8;
    $row = 20;
    ?>
    <table style="width:100%">
        <?php
        for($i = 1; $i <= $row; $i++){
            echo '<tr>';
            for($j = 1; $j <= $col; $j ++) {
                echo "<td>Hàng $i cột $j</td>";
            }
            echo '</tr>';
        }
        ?>
    </table>
</body>
</html>