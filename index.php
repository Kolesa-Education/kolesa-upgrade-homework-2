<?php
include 'AbstractAdvert.php';
include 'Sale.php';
include 'Rent.php';

$array = array();

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
];



foreach ($adverts as $key => $objects) {

        $rooms=$objects['rooms'];
        $category=$objects['category'];
        $price=$objects['price'];
        $type=$objects['type'];
        $period=$objects['period'];

        if ($category === 'sale'){
            $newObject  = new Sale($rooms,$category,$price,$type);
        }else{
            $newObject  = new Rent($rooms,$category,$price,$type,$period);
        }

        $newObject->getTitle();

        array_push($array, $newObject);

}







