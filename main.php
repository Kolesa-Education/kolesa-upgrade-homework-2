<?php

include "advert.php";

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'day'],
];

function makeSaleAdvert()
{
}


foreach ($adverts as $arr) {
    $rooms = 0;
    $category = "";
    $price = 0.0;
    $type = "";
    $period = "";
    foreach ($arr as $key => $value) {
        switch ($key) {
            case "rooms":
                $rooms = $value;
                break;
            case "category":
                $category = $value;
                break;
            case "price":
                $price = $value;
                break;
            case "type":
                $type = $value;
                break;
            case "period":
                $period = $value;
                break;
        }
    };
    if ($category === "rent") {
        $rent = new Rent;
        $rent->setRooms($rooms);
        $rent->setPrice($price);
        $rent->setType($type);
        $rent->setPeriod($period === "month" ? "помесячно" : "посуточно");
        $rent->getTitle();
        continue;
    }
    $sale = new Sale;
    $sale->setRooms($rooms);
    $sale->setPrice($price);
    $sale->setType($type);
    $sale->getTitle();
}
