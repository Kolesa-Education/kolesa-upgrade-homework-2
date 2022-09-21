<?php

class Advert {
    private $rooms;
    private $category;
    private $price;
    private $type;
    private $period = null;


    public function __construct($rooms, $category, $price, $type, $period) {
        $this->rooms = $rooms;
        $this->category = $category;
        $this->price = $price;
        $this->type = $type;
        $this->period = $period;
    }

    private function messageBuilder () {
        $isMillion = ($this->price >= 1000000) ? true : false;
        $categoryMessage = ($this->category == "sale") ? "Продам " : "Сдам ";
        $typeMessage = ($this->type == "dom") ? ($this->rooms."-комнатный дом ") : $this->rooms."-комнатную квартиру ";
        $priceMessage = ($isMillion == true) ? ($this->price / 1000000)." млн. тг " : $this->price." тг ";

        if ($this->period != null) {
            $periodMessage = ($this->period == "day" ? "в день" : "в месяц");
        }

        return $categoryMessage . $typeMessage . $priceMessage . $periodMessage;
    }

    public function getTitle() {
        return $this->messageBuilder();
    }
}

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
];

$advertsObjects = [];

foreach($adverts as $advert) {
    $rooms = $advert['rooms'];
    $category = $advert['category'];
    $price = $advert['price'];
    $type = $advert['type'];
    $period = $advert['period'];
    $advert = new Advert($rooms, $category, $price, $type, $period);
    array_push($advertsObjects, $advert); 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <?php   
                foreach ($advertsObjects as $advertsObject) {
                    echo $advertsObject->getTitle() . PHP_EOL . "</br>";
                }
            ?>
        </div>
    </div> 
</body>
</html>