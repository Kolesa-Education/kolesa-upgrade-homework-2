<?php
require_once 'Sale.php';
require_once 'Rent.php';

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
];

// Реализация задания
foreach ($adverts as $advertisement) {
    if (isset($advertisement['period'])) {
        (new Rent($advertisement))->getTitle();
    } else {
        (new Sale($advertisement))->getTitle();
    }
}

// Пример реализация дополнительного метода totalPrice
foreach ($adverts as $advertisement) {
    if (isset($advertisement['period'])) {
        (new Rent($advertisement))->totalPrice(25);
    }
}


