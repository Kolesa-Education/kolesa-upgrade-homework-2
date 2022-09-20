<?php
require('RentAdvert.php');

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'day'],
];

    $domSaleAdv = new SaleAdvert($adverts[0]['rooms'],$adverts[0]['category'], $adverts[0]['price'], $adverts[0]['type'], null);
    $kvartiraSaleAdv = new SaleAdvert($adverts[1]['rooms'],$adverts[1]['category'], $adverts[1]['price'], $adverts[1]['type'], null);
    $domRentAdv = new RentAdvert($adverts[2]['rooms'],$adverts[2]['category'], $adverts[2]['price'], $adverts[2]['type'], $adverts[2]['period']);
    $kvartiraRentAdv = new RentAdvert($adverts[3]['rooms'],$adverts[3]['category'], $adverts[3]['price'], $adverts[3]['type'], $adverts[3]['period']);

    $advertsArray = [];
    array_push($advertsArray, $domSaleAdv, $kvartiraSaleAdv, $domRentAdv, $kvartiraRentAdv);
    
    foreach($advertsArray as $value){
        print_r($value->getTitle());
    }
?>

