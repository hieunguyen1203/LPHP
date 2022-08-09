<?php
namespace MVC\Controllers;

use MVC\Models\AuthorModel;
use MVC\Models\BookModel;

class BookController
{
    /*
     * liệt kê ra các bản ghi
    */
    public function indexAction()
    {
        $model = new BookModel();
        $books = $model->fetchAll();

        include_once 'mvc/views/book/index.php';
    }
    /*
     * trả về view thêm mới book
    */
    public function addAction()
    {
        echo '<br />'. __METHOD__;
        exit;
    }

    public function insertAction()
    {
        echo '<br />'. __METHOD__;
        exit;
    }
    /*
     * trả về view sửa book
    */
    public function editAction()
    {
        $bookId = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $bookModel = new BookModel();
        $book = $bookModel->fetchOne($bookId);

        $authorModel = new AuthorModel();
        $authors = $authorModel->fetchAll();

        include_once 'mvc/views/book/edit.php';
    }
    public function updateAction()
    {
        $model = new BookModel();
        $model->update($_POST);
    }
}