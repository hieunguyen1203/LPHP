<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Hello World !');
echo $sheet->getCell("A1");
$writer = new Xlsx($spreadsheet);
try {
    $writer->save('hello world.xlsx');
} catch (\PhpOffice\PhpSpreadsheet\Writer\Exception $e) {

}