<?php
    abstract class Advert{
        private int $rooms;
        private String $type;
        private int $price;

        abstract public function getTitle();
    }

    class rentAdvert extends Advert{
        private $period;

        public function __construct($rooms, $type, $price, $period){
            if(isset($rooms))
                $this->rooms = $rooms;
            if(isset($type))
                $this->type = $type;
            if(isset($price))
                $this->price = $price;
            if(isset($period))
                $this->period = $period;
        }

        public function getTitle(){
            $title = "Сдам ";
            
            if(isset($this->rooms)){
                $title .= $this->rooms . "-комнатн";
            } else {
                return "";
            }

            if(isset($this->type)){
                if($this->type == 'dom'){
                    $title .= "ый дом ";
                } else if($this->type == 'kvartira'){
                    $title .= "ую квартиру ";
                }
            } else {
                return "";
            }

            if(isset($this->price)){
                if($this->price < 1000000)
                    $title .= "за ". number_format($this->price, 0, '.', ' ') ." тг";
                else
                    $title .= "за ". $this->price%1000000 ." млн. тг";
            } else {
                return "";
            }

            if(isset($this->period)){
                if($this->period == 'month')
                    $title .= " в месяц";
                if($this->period == 'day')
                    $title .= " в день";
                if($this->period == 'year')
                    $title .= " в год";
            } else {
                return "";
            }

            return $title;
        }
    }

    class sellAdvert extends Advert{
        public function __construct($rooms, $type, $price){
            if(isset($rooms))
                $this->rooms = $rooms;
            if(isset($type))
                $this->type = $type;
            if(isset($price))
                $this->price = $price;
        }
        
        public function getTitle(){
            $title = "Продам ";

            if(isset($this->rooms)){
                $title .= "$this->rooms-комнатн";
            } else {
                return "";
            }

            if(isset($this->type)){
                if($this->type == 'dom'){
                    $title .= "ый дом ";
                } else if($this->type == 'kvartira'){
                    $title .= "ую квартиру ";
                }
            } else {
                return "";
            }

            if(isset($this->price)){
                if($this->price < 1000000)
                    $title .= "за ". number_format($this->price, 0, '.', ' ') ." тг";
                else
                    $title .= "за ". $this->price/1000000 ." млн. тг";
            } else {
                return "";
            }

            return $title;
        }
    }

    $adverts = [
        ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
        ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
        ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
        ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
    ];

    //var_dump($adverts);

    $arrayOfAdverts = array();

    for($i = 0; $i < count($adverts); $i++){
        if($adverts[$i]['category'] === 'rent'){
            $advert = new rentAdvert($adverts[$i]['rooms'], $adverts[$i]['type'], $adverts[$i]['price'], $adverts[$i]['period']);
        } else if($adverts[$i]['category'] === 'sale'){
            $advert = new sellAdvert($adverts[$i]['rooms'], $adverts[$i]['type'], $adverts[$i]['price']);
        }
    
        array_push($arrayOfAdverts, $advert);
    }

    for($i = 0; $i < count($arrayOfAdverts); $i++){
        $result = $arrayOfAdverts[$i]->getTitle();
        echo $result . "<br>";
    }
?>