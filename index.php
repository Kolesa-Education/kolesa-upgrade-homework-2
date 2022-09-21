<?php
//include "models\Adverts.php";
//
//$adverts = [
//    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
//    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
//    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
//    ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
//];
//
//$arr = [];
//
//
//foreach ($adverts as $advert) {
//    if (empty($advert["period"])) {
//        $new_advert = new Adverts($advert["rooms"], $advert["category"], $advert["price"], $advert["type"], null);
//    }
//    if (!empty($advert["period"])) {
//        $new_advert = new Adverts($advert["rooms"], $advert["category"], $advert["price"], $advert["type"], $advert["period"]);
//    }
//    $arr[] = $new_advert;
//}
//
//foreach ($arr as $a) {
//    echo($a->getTitle());
//}
include "models\Advert.php";
include "models\House.php";
include "models\Flat.php";

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
];





$housesArray=[];
foreach ($adverts as $advert) {
    if ($advert["category"]=='sale') {
        $new_advert = new House($advert["rooms"],  $advert["price"], $advert["type"]);
    } else {
        $new_advert = new Flat($advert["rooms"],  $advert["price"], $advert["type"], $advert["period"]);
    }
    $housesArray[] = $new_advert;
}



foreach ($housesArray as $house) {
    echo $house->getTitle();
}





