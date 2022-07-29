<?php
include_once 'connect.php';

$bookId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$stmt = $pdo->prepare('SELECT books.book_title, authors.author_name FROM books INNER JOIN authors ON authors.author_id = books.book_author WHERE book_id = :book_id');
$stmt->bindParam(':book_id', $bookId, PDO::PARAM_INT);
$stmt->execute();
$book = $stmt->fetch(PDO::FETCH_ASSOC);

if(is_array($book) || !empty($book)) {
    if(isset($_GET['confirm'])) {
        $sql = 'DELETE FROM books WHERE book_id = :book_id';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':book_id', $bookId, PDO::PARAM_INT);
        $statement->execute();

    }
}
else {
    die('Không tìm thấy cuốn sách nào!');
}

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
    <div class="container">
        <h1>Xác nhận xoá sách <?php echo $book['book_title'] ?> của tác giả <?php echo $book['author_name'] ?></h1>
        <a href="index.php" class="btn btn-warning">Quay lại</a>
        <?php
            if(!isset($_GET['confirm'])) {
            ?>
                <a href="delete.php?id=<?php echo $bookId ?>&confirm" class="btn btn-danger">Xóa</a>
            <?php
            }
            else {
                echo 'Xoá thành công!';
            }
            ?>
    </div>
</body>
</html>
<?php
