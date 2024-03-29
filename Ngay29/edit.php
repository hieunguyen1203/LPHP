<?php
session_start();
include_once 'connect.php';

$bookId = isset($_GET['id']) ? (int)$_GET['id'] : 0;


$stmt1 = $pdo->query('SELECT author_id, author_name FROM authors ORDER BY author_name ASC');
$authors = $stmt1->fetchAll(PDO::FETCH_ASSOC);


$stmt2 = $pdo->prepare('SELECT * FROM books WHERE book_id = :book_id');
$stmt2->bindParam(':book_id', $bookId, PDO::PARAM_INT);
$stmt2->execute();
$book = $stmt2->fetch(PDO::FETCH_ASSOC);

if(is_array($book) || !empty($book)) {
    if(isset($_GET['update'])) {
        if(isset($_POST['book_title']) && isset($_POST['book_price']) && isset($_POST['book_intro']) && isset($_POST['book_content']) && isset($_POST['book_created']) && isset($_POST['book_author']) && !empty($_POST['book_title']) && !empty($_POST['book_intro']) && !empty($_POST['book_content']) && !empty($_POST['book_created'])) {
            if(!filter_var($_POST['book_price'],FILTER_VALIDATE_FLOAT)) {
                $_SESSION['result'] = false;
                $_SESSION['message'] = 'Giá sách không hợp lệ';
                header("Location: edit.php?id=".$bookId);
                exit;
            }
            if(!validateDate($_POST['book_created'])) {
                $_SESSION['result'] = false;
                $_SESSION['message'] = 'Ngày giờ không hợp lệ';
                header("Location: edit.php?id=".$bookId);
                exit;
            }
            //$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $stmt3 = $pdo->prepare('UPDATE books SET book_title = ?, book_price = ?, book_intro = ?, book_content = ?, book_created = ?, book_author = ? WHERE book_id = ?');
            $stmt3->bindParam(1, $_POST['book_title']);
            $stmt3->bindParam(2, $_POST['book_price']);
            $stmt3->bindParam(3, $_POST['book_intro']);
            $stmt3->bindParam(4, $_POST['book_content']);
            $stmt3->bindParam(5, $_POST['book_created']);
            $stmt3->bindParam(6, $_POST['book_author'], PDO::PARAM_INT);
            $stmt3->bindParam(7, $bookId, PDO::PARAM_INT);
            try{
                if ($stmt3->execute()) {
                    $_SESSION['result'] = true;
                    $_SESSION['message'] = 'Cập nhật thành công';

                    header("Location: edit.php?id=".$bookId);
                    exit;
                } else {
                    $_SESSION['result'] = false;
                    $_SESSION['message'] = 'Cập nhật thất bại';
                    header("Location: edit.php?id=".$bookId);
                    exit;
                }
            } catch (Exception $e) {
                $_SESSION['result'] = false;
                $_SESSION['message'] = 'Dữ liệu nhập vào không hợp lệ';
                header("Location: edit.php?id=".$bookId);
                exit;
            }
        }
        else {
            $_SESSION['result'] = false;
            $_SESSION['message'] = 'Hãy nhập đầy đủ dòng';
            header("Location: edit.php?id=".$bookId);
            exit;
        }
    }


}
else {
    die("Không tìm thấy sách");
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
        <?php
        if (isset($_SESSION['message']) && $_SESSION['message']) {
            if (isset($_SESSION['result']) && $_SESSION['result'] == true) {
                ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION['message'] ?>
                </div>
                <?php
            } else {
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['message'] ?>
                </div>
                <?php
            }
            unset($_SESSION['message']);
        }
        ?>
        <form name="add-book" method="post" action="edit.php?id=<?php echo $bookId ?>&update">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên sách</label>
                <input type="text" value="<?php echo htmlspecialchars($book['book_title']) ?>" class="form-control" name="book_title" id="book_title" placeholder="Tên sách">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Giá sách</label>
                <input type="text" value="<?php echo $book['book_price'] ?>" class="form-control" name="book_price" id="book_price" placeholder="Giá sách">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Giới thiệu</label>
                <textarea class="form-control" rows="5" id="book_intro" name="book_intro"><?php echo htmlspecialchars($book['book_intro']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Mô tả</label>
                <textarea class="form-control" rows="5" id="book_content" name="book_content"><?php echo htmlspecialchars($book['book_content']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Thời gian tạo sách</label>
                <input type="text" type="datetime-local" value="<?php echo $book['book_created'] ?>" class="form-control" name="book_created" id="book_created" placeholder="Thời gian tạo sách">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Tác giả:</label>
                <select class="form-select" name="book_author" id="book_author">
                    <option value="">chọn tác giả</option>
                    <?php
                    if(is_array($authors) && !empty($authors)) {
                        foreach ($authors as $author) {
                            ?>
                            <option value="<?php echo $author['author_id'] ?>" <?php echo $author['author_id'] == $book['book_author'] ? 'selected' : '' ?>><?php echo htmlspecialchars($author['author_name']) ?></option>
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
function validateDate($date, $format = 'Y-m-d H:i:s')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}
?>