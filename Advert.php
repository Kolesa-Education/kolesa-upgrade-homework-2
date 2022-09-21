<?php
    abstract class Advert {
        protected $rooms = -1;
        protected $category = "";
        protected $price = -1;
        protected $type = "";
        protected $period = null;

        public function getCategoryTitle() {
            return ($this->category == 'sale') ? "Продам " : "Сдам ";
        }

        public function getTypeTitle() {
            return ($this->type == "dom") ? ($this->rooms . "-комнатный дом за ") : ($this->rooms . "-комнатную квартиру за "); 
        }

        public function getPriceTitle() {
            return ($this->price >= 1000000) ? ($this->price / 1000000 . " млн. тг") : ($this->price . " тг");
        }
    }

    Class FlatAdvert extends Advert {
        protected $period = null;

        function __construct($rooms, $category, $price, $type, $period) {
            $this->rooms = $rooms;
            $this->category = $category;
            $this->price = $price; 
            $this->type = $type;
            $this->period = $period; 
        }   

        public function getPeriodMessage() {
            if (!$this->period) return "";

            return ($this->period == "month") ? " в месяц" : " в сутки"; 
        }

        public function getTitle() {
            return $this->getCategoryTitle() . $this->getTypeTitle() . $this->getPriceTitle() . $this->getPeriodMessage();
        }
    }

    Class HouseAdvert extends Advert { 

        function __construct($rooms, $category, $price, $type) {
            $this->rooms = $rooms;
            $this->category = $category;
            $this->price = $price; 
            $this->type = $type;
        } 

        public function getTitle() {
            return $this->getCategoryTitle() . $this->getTypeTitle() . $this->getPriceTitle();
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
        if ($add['period'] == null) {
            array_push($advertsObj, new HouseAdvert($add['rooms'], $add['category'], $add['price'], $add['type']));
        } else {
            array_push($advertsObj, new FlatAdvert($add['rooms'], $add['category'], $add['price'], $add['type'], $add['period']));
        }
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
                    echo $addObj->getTitle() . "</br>";
                }
            ?>
        </div>
    </div> 
</body>
</html>