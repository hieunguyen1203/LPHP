<?php
include_once 'connect.php';

$bookId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$sql = 'SELECT author_id, author_name FROM authors ORDER BY author_name ASC';
$statement = $pdo->query($sql);
$authors = $statement->fetchAll(PDO::FETCH_ASSOC);


$sql = 'SELECT * FROM books WHERE book_id = :book_id';
$statement = $pdo->prepare($sql);
$statement->bindParam(':book_id', $bookId, PDO::PARAM_INT);
$statement->execute();
$book = $statement->fetch(PDO::FETCH_ASSOC);

if(!is_array($book) || empty($book)) {
    die("Khong tim thay ban ghi");
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
        <h1>
            Sửa sách
        </h1>
        <form name="add-book" method="post" action="">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên sách</label>
                <input type="text" value="<?php echo $book['book_title'] ?>" class="form-control" id="book_title" placeholder="Tên sách">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Giá sách</label>
                <input type="text" value="<?php echo $book['book_price'] ?>" class="form-control" id="book_price" placeholder="Giá sách">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Giới thiệu</label>
                <textarea class="form-control" rows="5" id="book_intro" name="book_intro"><?php echo $book['book_intro'] ?>
                </textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Mô tả</label>
                <textarea class="form-control" rows="5" id="book_content" name="book_content"><?php echo $book['book_content'] ?>
                </textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Thời gian tạo sách</label>
                <input type="datetime-local" value="<?php echo $book['book_created'] ?>" class="form-control" id="book_created" placeholder="Thời gian tạo sách">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Tác giả:</label>
                <select class="form-select" name="book_author" id="book_author">
                    <option value="">chọn tác giả</option>
                    <?php
                    if(is_array($authors) && !empty($authors)) {
                        foreach ($authors as $author) {
                            ?>
                            <option value="<?php echo $author['author_id'] ?>" <?php echo $author['author_id'] == $book['book_author'] ? 'selected' : '' ?>><?php echo $author['author_name'] ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>