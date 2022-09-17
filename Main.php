<?php
require_once('AdvertController.php');

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'day'],
];


//Создание объявлений
$advertCreator = AdvertController::getInstance();
foreach ($adverts as &$advert){
    $advertCreator->createAdvert($advert);
}

//Вывод созданных объявлений
echo "Всего создано " . $advertCreator->getAdvertsCreatedCount() . " объявления" . PHP_EOL;
foreach ($advertCreator->getAdverts() as $key=>$advert){
    echo "ID: " . $advert->getId() . ", " . $advert->getTitle() . PHP_EOL;
}

//Тестирование функционала удаления
$advertCreator->deleteAdvert(1);
echo PHP_EOL . "Удаление объявления с ID=1" . PHP_EOL .PHP_EOL;

//Повторный вывод списка
foreach ($advertCreator->getAdverts() as $key=>$advert){
    echo "ID: " . $advert->getId() . ", " . $advert->getTitle() . PHP_EOL;
}