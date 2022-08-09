<?php
session_start();
//https://domain.com/index.php

define('SITE_URL', 'http://lphp.abc/Ngay30/books/index.php');

//http://lphp.abc/Ngay30/books/index.php?controller=book&action=index

include_once 'mvc/router.php';
include_once 'mvc/controllers/BookController.php';
include_once 'mvc/controllers/IndexController.php';
include_once 'mvc/controllers/ErrorController.php';
include_once 'mvc/models/Connect.php';
include_once 'mvc/models/BookModel.php';
include_once 'mvc/models/AuthorModel.php';

use \MVC\Router;
$router = new Router();
$router->redirectRouter();

