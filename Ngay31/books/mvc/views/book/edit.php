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
    <form name="add-book" method="post" action="<?php echo SITE_URL ?>?controller=book&action=update">
        <input type="hidden" name="book_id" value="<?php echo htmlspecialchars($book['book_id']) ?>">
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
        <a href="<?php echo SITE_URL ?>?controller=book&action=index" class="btn btn-info">Quay lại</a>
    </form>
</div>
</body>
</html>