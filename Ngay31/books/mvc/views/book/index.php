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
<div class="container">
    <p>
        <a href="add.php" class="btn btn-info">Thêm sách</a>
    </p>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Book Title</th>
            <th scope="col">Book Price</th>
            <th scope="col">Tác giả</th>
            <th scope="col">Created</th>
            <th scope="col">Hành động</th>
        </tr>
        </thead>
        <tbody>

        <?php
        if(is_array($books) && !empty($books)) {
            foreach ($books as $book) {
                ?>
                <tr>
                    <th scope="row"><?php echo $book['book_id']; ?></th>
                    <td><?php echo htmlspecialchars($book['book_title']); ?></td>
                    <td><?php echo htmlspecialchars($book['book_price']); ?></td>
                    <td><?php echo htmlspecialchars($book['author_name']); ?></td>
                    <td><?php echo htmlspecialchars($book['book_created']); ?></td>
                    <td>
                        <a href="<?php echo SITE_URL ?>?controller=book&action=edit&id=<?php echo $book['book_id'] ?>" class="btn btn-warning">Sửa sách</a>
                        <a href="<?php echo SITE_URL ?>?controller=book&action=delete&id=<?php echo $book['book_id'] ?>" class="btn btn-danger">Xóa sách</a>
                    </td>
                </tr>
                <?php

            }
        }

        ?>

        </tbody>
    </table>
</div>

</body>
</html>