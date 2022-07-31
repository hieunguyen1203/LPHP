<?php
include_once 'connect.php';

$sql = 'SELECT author_id, author_name FROM authors ORDER BY author_name ASC';

$statement = $pdo->query($sql);
$authors = $statement->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['add'])) {
    if (isset($_POST['book_title']) && isset($_POST['book_price']) && isset($_POST['book_intro']) && isset($_POST['book_content']) && isset($_POST['book_created']) && isset($_POST['book_author']) && !empty($_POST['book_title']) && !empty($_POST['book_intro']) && !empty($_POST['book_content']) && !empty($_POST['book_created'])) {
        $stmt = $pdo->prepare('INSERT INTO books (book_title, book_price, book_intro, book_content, book_created, book_author) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->bindParam(1, $_POST['book_title']);
        $stmt->bindParam(2, $_POST['book_price'], PDO::PARAM_INT);
        $stmt->bindParam(3, $_POST['book_intro']);
        $stmt->bindParam(4, $_POST['book_content']);
        $stmt->bindParam(5, $_POST['book_created']);
        $stmt->bindParam(6, $_POST['book_author'], PDO::PARAM_INT);
        $stmt->execute();
        Header("Location: add.php?success");
    }
    else {
        die("Hãy nhập đầy đủ dòng!");
    }
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
            Thêm sách
        </h1>
        <?php
        if(isset($_GET['success'])) {
            echo '<div class="alert alert-success">Đã thêm thành công</div>';
        }
        ?>
        <form name="add-book" method="post" action="add.php?add">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên sách</label>
                <input type="text" class="form-control" id="book_title" name="book_title" placeholder="Tên sách">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Giá sách</label>
                <input type="text" class="form-control" id="book_price" name="book_price" placeholder="Giá sách">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Giới thiệu</label>
                <textarea class="form-control" rows="5" id="book_intro" name="book_intro"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Mô tả</label>
                <textarea class="form-control" rows="5" id="book_content" name="book_content"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Thời gian tạo sách</label>
                <input type="datetime-local" class="form-control" id="book_created" name="book_created" placeholder="Thời gian tạo sách">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Tác giả:</label>
                <select class="form-select" name="book_author" id="book_author">
                    <option value="">chọn tác giả</option>
                    <?php
                    if(is_array($authors) && !empty($authors)) {
                        foreach ($authors as $author) {
                            ?>
                            <option value="<?php echo $author['author_id'] ?>"><?php echo $author['author_name'] ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="index.php" class="btn btn-info">Quay lại</a>
        </form>
    </div>
</body>
</html>
<?php
