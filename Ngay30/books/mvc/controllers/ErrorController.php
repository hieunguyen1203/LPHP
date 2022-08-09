<?php
namespace MVC\Controllers;

class ErrorController
{
    public function notFoundAction(): void
    {
        $message = '404 not found';
        include_once 'mvc/views/error/notFound.php';
    }
}