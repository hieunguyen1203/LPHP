<?php
include_once 'connect.php';


$stmt = $pdo->query('SELECT books.*, authors.author_name
FROM authors RIGHT JOIN books ON books.book_author = authors.author_id ORDER BY book_created DESC LIMIT 0,50');
$ath =  $stmt->fetchAll(PDO::FETCH_ASSOC);



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
</head>
<body>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Book Title</th>
        <th scope="col">Book Price</th>
        <th scope="col">Tác giả</th>
        <th scope="col">Created</th>
    </tr>
    </thead>
    <tbody>

    <?php
    $i = 1;
    if(is_array($ath) && !empty($ath)) {


        foreach ($ath as $book) {
            ?>
            <tr>
                <th scope="row"><?php echo $i ?></th>
                <td><?php echo $book['book_title']; ?></td>
                <td><?php echo $book['book_price']; ?></td>
                <td><?php echo $ath[$i-1]['author_name']; ?></td>
                <td><?php echo $book['book_created']; ?></td>
            </tr>
            <?php $i ++ ?>
            <?php

        }
    }

    ?>

    </tbody>
</table>
</body>
</html>
