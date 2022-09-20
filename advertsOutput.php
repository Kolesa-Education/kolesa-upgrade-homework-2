<?php
require_once ("House.php");
require_once ("Flat.php");

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
];

foreach ($adverts as $advert) {
    if($advert["type"] === "dom"){
        (new HouseAdvert($advert))->getTitle();
    }else if ($advert["type"] === "kvartira"){
        (new FlatAdvert($advert))->getTitle();
    }
    
}