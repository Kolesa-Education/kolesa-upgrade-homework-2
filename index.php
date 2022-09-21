<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>
<?php

require_once("Advert.php");
require_once("AdvertList.php");
require_once("FilterAdverts.php");

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'day'],
];

echo "Class Advert <br>";
$advert = new Advert($adverts['0']);
$advert->show_title();
echo "<br>";

echo "Class AdvertList <br>";
$advertList = new AdvertsList($adverts);
$advertList->show_all_adverts();
echo "<br>";

echo "Class FilterAdverts <br>";
$filterAdverts = new FilterAdverts($adverts);
$result = $filterAdverts->filter_by_category('rent');
$advertList = new AdvertsList($result);
$advertList->show_all_adverts();
echo "<br>";


?>

</html>