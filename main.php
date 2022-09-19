<?php

include "advert.php";

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'day'],
];
$sale = new Rent();
$sale->setType("kvartira");
$sale->setRooms(5);
$sale->setPrice(112512512);
$sale->setPeriod("посуточно");
$sale->getTitle();

$home = new Sale();
$home->setType("kvartira");
$home->setRooms(5);
$home->setPrice(11251251342);
$home->getTitle();



// foreach ($adverts as $arr) {
//     foreach ($arr as $key => $value) {
//         print_r($key . "=>" . $value);
//         print_r("\n");
//     };
// }
