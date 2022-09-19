<?php

include "advert.php";

// $sale = new Sale();
// $sale->setRooms(5);
// $sale->setPrice(1);
// $sale->getTitle();
// $rent = new Rent();
// $rent->setRooms(5);
// $rent->setPrice(150000);
// $rent->getTitle();


$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'day'],
];
$sale = new Rent();
$sale->setType("квартира");
$sale->setRooms(5);
$sale->setPrice(112512512);
$sale->setPeriod("посуточно");
$sale->getTitle();



// foreach ($adverts as $arr) {
//     foreach ($arr as $key => $value) {
//         print_r($key . "=>" . $value);
//         print_r("\n");
//     };
// }
