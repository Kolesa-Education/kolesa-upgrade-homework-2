<?php
    Class Advert {
        private $rooms = -1;
        private $category = "";
        private $price = -1;
        private $type = "";
        private $period = null;

        function __construct($rooms, $category, $price, $type, $period = null) {
            $this->rooms = $rooms;
            $this->category = $category;
            $this->price = $price; 
            $this->type = $type;
            $this->period = $period; 
        }   

        public function properMessage() {
            $isMillion = ($this->price >= 1000000) ? true : false; 
            $typeMessage = ($this->type == "dom") ? ($this->rooms . "-комнатный дом за ") : ($this->rooms . "-комнатную квартиру за "); 
            $categoryMessage = ($this->category == 'sale') ? "Продам " : "Сдам ";
            $this->price = ($isMillion) ? ($this->price / 1000000) : $this->price; 
            $priceMessage = ($isMillion) ? ($this->price . " млн. тг") : ($this->price . " тг");
            $periodMessage = "";

            if ($this->period != null) {
                $periodMessage = ($this->period == "month") ? " в месяц" : " в сутки"; 
            }

            return $categoryMessage . $typeMessage . $priceMessage . $periodMessage;
        }

        public function getTitle() {
            return $this->properMessage();
        }
    }

    $adverts = [
        ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
        ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
        ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
        ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
    ];
    $advertsObj = [];

    foreach ($adverts as $add) {
        $rooms = $add['rooms'];
        $category = $add['category'];
        $price = $add['price'];
        $type = $add['type'];
        $period = $add['period']; 
        $add = new Advert($rooms, $category, $price, $type, $period);
        array_push($advertsObj, $add);
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
    <div class="wrapper">
        <div class="wrapper__adds">
            <?php   
                foreach ($advertsObj as $addObj) {
                    echo $addObj->getTitle() . PHP_EOL . "</br>";
                }
            ?>
        </div>
    </div> 
</body>
</html>