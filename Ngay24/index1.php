<?php
$colors = [
    'black'      => 'Black',
    'space-gray' => 'Space Gray',
    'jet-black'  => 'Jet Black',
    'silver'     => 'Silver',
    'gold'       => 'Gold',
    'rose-gold'  => 'Rose Gold',
];

$products = [
    ['id' => 100, 'name' => 'iPhone SE (32 GB)', 'price' => '128.00', 'colors' => $colors],
    ['id' => 101, 'name' => 'iPhone SE (64 GB)', 'price' => '432.00', 'colors' => $colors],
    ['id' => 102, 'name' => 'iPhone SE (128 GB)', 'price' => '1280.00', 'colors' => $colors],

];


require_once 'class.Cart.php';

$cart = new Cart(['cartMaxItem' => 3, 'itemMaxQuantity' => 99, 'useCookie' => true]);

