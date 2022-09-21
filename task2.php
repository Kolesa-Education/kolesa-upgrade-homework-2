<?php
    abstract class PropertyTemplate {
        public $numberOfRooms = 0;
        abstract public function setNumberOfRooms(int $numberOfRooms);
        abstract public function getNumberOfRooms(): int;
        abstract public function setType(string $type);
        abstract public function getType(): string;
    }

    class Property{
        private $price = 0;
        private $period = "";
        private $numberOfRooms = 0;
        private $type = 'unknown';
        public function __construct($numberOfRooms, $price, $type, $period)
        {
            $this->numberOfRooms = $numberOfRooms;
            $this->type = $type;
            $this->price = $price;
            $this->period = $period;
        }

        public function setPrice($price)
        {
            $this->price = $price;
        }

        public function getPrice(): int
        {
            return $this->price;
        }

        public function setPeriod($period)
        {
            $this->period = $period;
        }

        public function getPeriod(): string
        {
            return $this->period;
        }
        public function setNumberOfRooms(int $numberOfRooms)
        {
            $this->numberOfRooms = $numberOfRooms;
        }

        public function getNumberOfRooms(): int
        {
            return $this->numberOfRooms;
        }

        public function setType($type)
        {
            $this->type = $type;
        }
    
        public function getType(): string
        {
            return $this->type;
        }
    }

    class Advert extends Property{
        private $category;
        
        public function __construct(int $numberOfRooms, string $category, int $price, string $type, string $period)
        {
            parent::__construct($numberOfRooms, $price, $type, $period);
            $this->category = $category;
        }
        public function setCategory(string $category)
        {
            $this->category = $category;
        }

        public function getCategory(): string
        {
            return $this->category;
        }

        public function getTitle(){
            $res = "";
            if ($this->category == "sale") {
                $res = $res. "Продам ";
            } else if ($this->category == "rent"){
                $res = $res. "Сдам ";
            }else{
                echo "unknown category";
                return;
            };
            $res = $res.parent::getNumberOfRooms();

            if (parent::getType() == "dom") {
                $res = $res."-комнатный дом за ";
            } else if (parent::getType() == "kvartira"){
                $res = $res."-комнатную квартиру за ";
            }else{
                echo "unknown type";
                return;
            };

            $res = $res.$this->priceTransform();

            if (parent::getPeriod() == "day"){
                $res = $res."в сутки";
            }else if (parent::getPeriod() == "month"){
                $res = $res."в месяц";
            };
            echo $res.'<br>';
        }
        public function priceTransform():string
        {
            if ((parent::getPrice()/ 100000) > 9){
                return (parent::getPrice()/ 1000000)." млн. тг";
            }

            return parent::getPrice().' ';
        }

    }
    


    $adverts = [
        ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
        ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
        ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
        ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
    ];
    foreach ($adverts as $arr){
        if ($arr['period']==NULL){
            $test=new Advert($arr['rooms'],$arr['category'],$arr['price'],$arr['type'],'');
        }else{
            $test=new Advert($arr['rooms'],$arr['category'],$arr['price'],$arr['type'],$arr['period']);
        }
        
        $test->getTitle() ;
    }
    