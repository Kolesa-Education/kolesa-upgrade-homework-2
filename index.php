<?php

include "advert.php";

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'day'],
];

foreach ($adverts as $arr) {
    if ($arr['category'] === 'sale') {
        $sale = new Sale;
        $sale->setRooms($arr['rooms']);
        $sale->setPrice($arr['price']);
        $sale->setType($arr['type']);
        $sale->getTitle();
        continue;
    }
    $rent = new Rent;
    $rent->setRooms($arr['rooms']);
    $rent->setPrice($arr['price']);
    $rent->setType($arr['type']);
    $rent->setPeriod($arr['period'] === "month" ? "помесячно" : "посуточно");
    $rent->getTitle();
}
