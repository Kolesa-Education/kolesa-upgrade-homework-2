 <?php
 require_once 'Sale.php';
 require_once 'Rent.php';
 require_once 'Advert.php';

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'day'],
];
    foreach ($adverts as $value) {
        if ($value['category'] == "sale"){
            $adv = new Sale($value['rooms'], $value['category'], $value['price'], $value['type'], $value['period'] ?? "");
            echo $adv->getTitle()."<br/>";
        }else{
            $ads = new Rent($value['rooms'], $value['category'], $value['price'], $value['type'], $value['period'] ?? "");
            echo $ads->getTitle()."<br/>";
        }
        
}
?>