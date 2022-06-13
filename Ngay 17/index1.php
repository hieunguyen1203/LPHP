<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../Ngay 15/bootstrap.min.css">

    <script src="../Ngay 15/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
        <?php
        for($i = 1; $i <= 9; $i ++) {
            echo '<div class="col-lg-1">';
            for($j = 1; $j <= 9; $j++) {
                
                echo "$i * $j = ". $i * $j. "<br />";
            }
            echo '</div>';
        }
        ?>
        </div>
    </div>
    
</body>
</html>