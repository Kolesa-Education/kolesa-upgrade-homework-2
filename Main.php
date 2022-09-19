<?php

require_once './House.php';
require_once './RentableHouse.php';

$adverts = include './seeds.php';

foreach ($adverts as $advert) {
    $house = $advert['category'] === 'rent' ?
        new RentableHouse($advert['rooms'], $advert['category'], $advert['price'], $advert['type'], $advert['period']) :
        new House($advert['rooms'], $advert['category'], $advert['price'], $advert['type']);

    echo $house->getTitle() . "<br>";
}
