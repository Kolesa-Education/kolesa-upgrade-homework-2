<?php
require_once 'House.php';
require_once 'SaleHouse.php';
require_once 'RentHouse.php';
$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'day'],
];

$arr = [];
foreach ($adverts as $advert) {
    if (!empty($advert['period'])) {
        $new_advert = new RentHouse($advert['rooms'], $advert['price'], $advert['type'], $advert['period']);
    } else {
        $new_advert = new SaleHouse($advert['rooms'], $advert['price'], $advert['type']);

    }
    $arr[] = $new_advert;
}

foreach ($arr as $a) {
    echo $a->getTitle();
}
