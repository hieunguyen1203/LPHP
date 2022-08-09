<?php
namespace MVC\Models;

class AuthorModel extends \MVC\Models\Connect
{
    public function fetchAll()
    {
        $stmt1 = $this->pdo->query('SELECT author_id, author_name FROM authors ORDER BY author_name ASC');
        return $stmt1->fetchAll(\PDO::FETCH_ASSOC);
    }
}