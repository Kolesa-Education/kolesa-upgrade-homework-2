<?php

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'day'],
];

foreach ($adverts as $advert) {
    if ($advert['category'] == 'sale') {
        $saleAdvert = new SaleAdvert($advert['rooms'], $advert['category'], $advert['price'], $advert['type']);
        echo $saleAdvert->getTitle();
    }
    if ($advert['category'] == 'rent') {
        $rentAdvert = new RentAdvert($advert['rooms'], $advert['category'], $advert['price'], $advert['type'], $advert['period']);
        echo $rentAdvert->getTitle();
    }
}