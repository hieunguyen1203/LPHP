<?php
require_once "index8.php";
require_once "index8b.php";

use \Dat\demoClass as demoClassA;
use \TuanAnh\demoClass as demoClassB;
$a = new demoClassA();
$a->info();

$b = new demoClassB();
$b->info();