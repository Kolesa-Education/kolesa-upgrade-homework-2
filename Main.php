<?php

require_once('AdvertController.php');

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'day'],
    ['mileage' => 50000, 'category' => 'leasing', 'price' => 150000, 'type' => 'car',
        'model'=> 'Mazda 6', 'yearOfIssue' => 2019, "period" => "month"],
    ['mileage' => 250000, 'category' => 'sell', 'price' => 15000000, 'type' => 'car',
        'model'=> 'Mazda 6', 'yearOfIssue' => 2019],
];


//Создание объявлений
$advertCreator = AdvertController::getInstance();
foreach ($adverts as &$advert){
    $advertCreator->createAdvert($advert);
}

//Вывод созданных объявлений
echo "Всего создано " . $advertCreator->getAdvertsCreatedCount() . " объявления" . PHP_EOL;
foreach ($advertCreator->getAdverts() as $advert){
    echo "ID: " . $advert->getId() . ", " . $advert->getTitle() . PHP_EOL;
}

//Тестирование функционала удаления и изменения
$advertCreator->deleteAdvert(1);
$advertCreator->getAdvertById(5)->setPrice(10000000);
echo PHP_EOL . "Удаление объявления с ID=1, изменение цены у объявления с ID=10" . PHP_EOL .PHP_EOL;

//Повторный вывод списка
foreach ($advertCreator->getAdverts() as $key=>$advert){
    echo "ID: " . $advert->getId() . ", " . $advert->getTitle() . PHP_EOL;
}