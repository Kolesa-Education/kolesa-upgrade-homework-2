<?php

require_once 'classes/RealEstateAdvert.php';

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
];

foreach ($adverts as $advert) {
    $result = new RealEstateAdvert(
        $advert['rooms'],
        $advert['category'],
        $advert['type'],
        $advert['price'],
        $advert['period'] ?? null
    );
    echo $result->getTitle() . '<br>';
}