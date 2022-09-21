<?php
include_once 'rent.php';
include_once 'sale.php';
?>

<?php
$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'day'],
];
foreach ($adverts as $advert) {
    if ($advert['category'] == 'rent') {
            $a = new Rent($advert);
            echo $a->getTitle();
    } else if ($advert['category'] == 'sale') {
            $a = new Sale($advert);
            echo $a->getTitle();
    }
}
?>

