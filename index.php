<?php

include_once 'Advert.php';
include_once 'Flat.php';
include_once 'House.php';
include_once 'Rent.php';
include_once 'Sale.php';

use Advert\Advert;
use Advert\Flat;
use Advert\House;
use Advert\Rent;
use Advert\Sale;

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'day'],
];

foreach ($adverts as $advert) {
    try {
        if ($advert['category'] == 'sale') {
            $category = new Sale();
        } elseif ($advert['category'] == 'rent') {
            $category = new Rent($advert['period']);
        } else {
            throw new Exception('Category not exists');
        }

        if ($advert['type'] == 'dom') {
            $livingSpace = new House($advert['rooms']);
        } elseif ($advert['type'] == 'kvartira') {
            $livingSpace = new Flat($advert['rooms']);
        } else {
            throw new Exception('Living space type not exists');
        }

        $advert = new Advert($advert['price'], $category, $livingSpace);
        $title = $advert->getTitle();

        echo $title . '<br>';
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage() . '<br>';
    }
}
