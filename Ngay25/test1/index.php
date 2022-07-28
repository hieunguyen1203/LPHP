<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="document" /> <br>
    <input type="submit" name= "submit" value="Upload!">
</form>
<?php
include_once 'class.Upload.php';
if(isset($_FILES['document']) && isset($_POST['submit'])) {
    if($_FILES['document']['error'] == 0) {
        $uploadInstance = new Upload($_FILES['document'], ['jpg','png'], 5*1024*1024, 'upload');
        echo $uploadInstance->uploadFile();
    }
}

?>
</body>
</html>