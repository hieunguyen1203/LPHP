<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table, tr, td {
            border: 1px solid;

        }
        td {
            min-width: 20px;
        }
    </style>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <div>Chọn file</div>
        <input type="file" name="excelFile"><br>
        <input type="submit" name="submit"><br><br>
    </form>
</body>
</html>

<?php
require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
if(isset($_FILES["excelFile"]) && isset($_POST["submit"])) {
    //var_dump($_FILES);
    if($_FILES["excelFile"]["error"] == 0) {

        $allowed = ['xls' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'pdf' => 'application/pdf'];
        $filename = $_FILES['excelFile']['name'];
        $filetype = $_FILES['excelFile']['type'];
        $filesize = $_FILES['excelFile']['size'];
        $max_file_size = 5*1024*1024;
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(array_key_exists($ext, $allowed)) {
            if($max_file_size > $filesize) {
                if(in_array($filetype, $allowed)) {
                    move_uploaded_file($_FILES["excelFile"]["tmp_name"], $filename);
                    $testAgainstFormats = [
                        IOFactory::READER_XLS,
                        IOFactory::READER_XLSX,
                    ];
                    try {
                        $spreadsheet = IOFactory::load($filename, 0, $testAgainstFormats);
                        $sheet = $spreadsheet->getActiveSheet();
                        $noi_dung_xls = '';
                        echo '<b>Nội dung file excel:</b> <br><br>';
                        echo '<table>';
                        foreach ($sheet->getRowIterator() as $row) {
                            echo '<tr>';
                            $cellIterator = $row->getCellIterator();
                            $cellIterator->setIterateOnlyExistingCells(FALSE);
                            foreach ($cellIterator as $cell) {
                                $noi_dung_xls .= $cell->getValue().',';
                                echo '<td>' . $cell->getValue() . '</td>';
                            }
                            $noi_dung_xls .= PHP_EOL;
                            echo '</tr>';
                        }
                        echo '</table>';
                        file_put_contents($filename.".txt", $noi_dung_xls);
                    }
                    catch (Exception $e) {
                        echo $e->getMessage();
                    }
                    unlink($filename);
                }
                else {
                    echo 'File khong ho tro';
                }
            }
            else {
                echo 'File qua lon';
            }

        }
        else {
            echo 'File khong ho tro';
        }

    }
}

?>