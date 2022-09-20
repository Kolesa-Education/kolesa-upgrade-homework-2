<?php
declare (strict_types = 1);
include 'includes/autoloader.inc.php';
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
    <?php

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'day'],
];

foreach ($adverts as $key) {
    $advert = new Title($key['rooms'], $key['category'], $key['price'], $key['type'], $key['period'] ?? "");
    echo $advert->getTitle() . "<br>";
    
    //$advert = new Advert($key['rooms'], $key['category'], $key['price'], $key['type'], $key['period'] ?? "");
    //echo $advert->getAdvert() . "<br>";
}

?>
</body>
</html>