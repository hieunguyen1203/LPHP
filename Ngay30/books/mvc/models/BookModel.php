<?php
namespace MVC\Models;

class BookModel extends Connect
{

    public function fetchAll()
    {
        $sql = 'SELECT books.*, authors.author_name FROM books LEFT JOIN authors ON authors.author_id = books.book_author';
        $statement = $this->pdo->query($sql);
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function fetchOne($bookId)
    {
        $stmt2 = $this->pdo->prepare('SELECT * FROM books WHERE book_id = :book_id');
        $stmt2->bindParam(':book_id', $bookId, \PDO::PARAM_INT);
        $stmt2->execute();
        return $stmt2->fetch(\PDO::FETCH_ASSOC);
    }
}