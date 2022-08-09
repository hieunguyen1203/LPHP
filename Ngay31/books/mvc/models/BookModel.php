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
    public function update($data)
    {
        $stmt3 = $this->pdo->prepare('UPDATE books SET book_title = ?, book_price = ?, book_intro = ?, book_content = ?, book_created = ?, book_author = ? WHERE book_id = ?');
        $stmt3->bindParam(1, $data['book_title']);
        $stmt3->bindParam(2, $data['book_price']);
        $stmt3->bindParam(3, $data['book_intro']);
        $stmt3->bindParam(4, $data['book_content']);
        $stmt3->bindParam(5, $data['book_created']);
        $stmt3->bindParam(6, $data['book_author'], \PDO::PARAM_INT);
        $stmt3->bindParam(7, $data['book_id'], \PDO::PARAM_INT);
        if ($stmt3->execute()) {
            $_SESSION['result'] = true;
            $_SESSION['message'] = 'Cập nhật thành công';
            $url = SITE_URL.'?controller=book&action=edit&id='.$data['book_id'];
            header("Location: $url");
            exit;
        } else {
            $_SESSION['result'] = false;
            $_SESSION['message'] = 'Cập nhật thất bại';
            $url = SITE_URL.'?controller=book&action=edit&id='.$data['book_id'];
            header("Location: $url");
            exit;
        }
    }
}