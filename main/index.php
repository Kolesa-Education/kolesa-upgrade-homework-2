<?php

require "class.php";

$adverts = [
    ["rooms" => 5, "category" => "sale", "price" => '50000-', "type" => "dom"],
    ["rooms" => 1],
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 'q', 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
    ["category" => 1]
];

$wrong_advert = array();

foreach ($adverts as $key => $advert) {
    if (!isset($advert["category"]) || !isset($advert["rooms"]) || !is_numeric($advert["rooms"]) ||
    !isset($advert["price"]) || !is_numeric($advert["price"]) || !isset($advert["type"])) {
        array_push($wrong_advert, $key+1);
    } elseif ($advert["category"] == "sale") {
        $advert = new SaleAdvertClass($advert["rooms"], $advert["price"], $advert["type"]);
        echo $advert->get_title();
    } elseif ($advert["category"] == "rent") {
        $advert = new RentAdvertClass($advert["rooms"], $advert["price"], $advert["type"], $advert["period"]);
        echo $advert->get_title();
    }
}

if(!empty($wrong_advert)){
    echo "Прошу поправить следующие обявление они не полные либо не корректные:" . implode(", ", $wrong_advert) . "<br>"; 
}

