<?php



require_once("Control/advertControl.php");

// the given massive
  $adverts = [
['rooms' => 5, 'category' => 'продажа', 'price' => 55000000, 'type' => 'дом'],
['rooms' => 2, 'category' => 'продажа', 'price' => 21500000, 'type' => 'дом'],
['rooms' => 2, 'category' => 'сдача', 'price' => 200000, 'type' => 'квартира', 'period' => 'месяц'],
['rooms' => 1, 'category' => 'сдача', 'price' => 15000, 'type' => 'квартира', 'period' => 'день'],
];


  $advertCotrol= new AdvertControl($adverts);
  $advertCotrol->PrintArr(); 
