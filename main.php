<?php
require 'advert.php';


$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
];


// $kek = new Advert(5, 'sale', 55000000, 'dom', 'month');
// echo $kek;

foreach ($adverts as $advert) {
    $ad_obj = new Advert($advert);
    echo $ad_obj->getTitle();
}

// так и не понял почему в конце программы 4 пустых строки появляются :(

?>




