<?php

require_once __DIR__ . "/vendor/autoload.php";

use function App\advertCreator;

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'day'],
    ['rooms' => 5, 'category' => 'rent', 'price' => 150000, 'type' => 'dom', 'period' => 'day'],
];

foreach ($adverts as $advert) {
    echo advertCreator($advert)->getTitle() . PHP_EOL;
}