<?php
include 'advert.php';

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
];

foreach($adverts as $ad){
    $ad['category'] = ($ad['category'] == "sale") ? "Продам" : "Сдам";
    $ad['type'] = ($ad['type'] == "dom") ? "дом" : "квартиру";
    $objAdvert = new AdvertHome($ad['rooms'], $ad['category'], $ad['price'], $ad['type']);
    echo $objAdvert->getTitle();
        if (array_key_exists('period', $ad)){
            $ad['period'] = ($ad['period'] == "month") ? "месяц" : "сутки";
            $objAdvert->setPeriod($ad['period']);
            echo $objAdvert->getPeriod();
        }
        echo "<br>\n";
    } 
?>

