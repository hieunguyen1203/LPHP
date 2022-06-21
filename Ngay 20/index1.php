<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .img-box{
            display: inline-block;
            text-align: center;
            margin: 0 15px;
        }
    </style>
</head>
<body>
<?php
    $images = ["kites.jpg", "balloons.jpg"];
    foreach ($images as $image) {
        echo "<div class=\"img-box\">";
        echo "<img src='images/$image' width='200' alt='".pathinfo($image, PATHINFO_EXTENSION)."'>";
        echo '<p><a href="download.php?file=' . urlencode($image) . '">Download</a></p>';
        echo "</div>";
    }
?>

</body>
</html>