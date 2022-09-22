<?php
require 'advert.php';

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
];

// you can create  object by passing arguments directly like below:
// $myobj = new Advert(5, 'sale', 55000000, 'dom', 'month');

// or you can pass dictionary
foreach ($adverts as $ad) {
    if (isset($ad['period'])) {
        $ad_obj = new Advert($ad['rooms'], $ad['category'], $ad['price'], $ad['type'], $ad['period'],);
    }
    else {
        $ad_obj = new Advert($ad['rooms'], $ad['category'], $ad['price'], $ad['type']);
    }
    
    echo $ad_obj->getTitle();
}

?>
