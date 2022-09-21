<?php

include("Advert.php");

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
];


$objectAdverts = array();

foreach ($adverts as $advert) {
    $period = array_key_exists('period', $advert) ? $advert['period'] : '';
    array_push($objectAdverts, new Advert(
        category: $advert['category'],
        price: $advert['price'],
        estateType: $advert['type'],
        numberOfRooms: $advert['rooms'],
        period: $period
    ));
}

foreach ($objectAdverts as $advert) {
    echo $advert->getTitle() . PHP_EOL;
}