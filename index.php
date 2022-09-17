<?php

include_once 'AdvertFactory.php';

use Advert\AdvertFactory;

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'day'],
];

$advertFactory = new AdvertFactory();

foreach ($adverts as $advert) {
    try {
        $advert = $advertFactory->createAdvert($advert);
        echo $advert->getTitle() . '<br>';
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage() . '<br>';
    }
}
