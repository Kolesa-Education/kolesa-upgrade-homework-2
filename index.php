<?php
include 'advert.php';
$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'day'],
];

foreach ($adverts as $advert) {
    $tmp_period = $advert['period'] ?? " ";
    $tmp_advert = new EstateAdvert(
        rooms: $advert['rooms'],
        category: Category::from($advert['category']),
        price: $advert['price'],
        type: Type::from($advert['type']),
        period: Period::from($tmp_period),
    );


    echo $tmp_advert->getTitle() . PHP_EOL;
}
