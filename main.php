<?php

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'day'],
];

interface AdvertInterface {
    public function getTitle();
}

abstract class Advert{

    public $type;
    public $price;
    public $category;
    public $rooms;

    public function __construct($type, $price, $category, $rooms){
        $this->type=$type;
        $this->price=$price;
        $this->category=$category;
        $this->rooms=$rooms;
    }
}

class Rent extends Advert implements AdvertInterface{

    public $period;

    public function __construct($type, $price, $category, $rooms, $period){
        $this->period=$period;
        parent::__construct($type, $price, $category, $rooms, $period);
    }
    
    public function getTranslatePeriod($period){
        if ($period=='month') {
            return "месяц";
        } else if ($period=='day') {
            return "сутки";
        } 
        return $period;
    }

    public function getTitle(){
        if ($this->type=='dom') {
            return "Сдам " . $this->rooms . "-комнатный дом за " . $this->price . " тг в " . $this->getTranslatePeriod($this->period) . "\n";
        } else {
            return "Сдам " . $this->rooms . "-комнатную квартиру за " . $this->price . " тг в " . $this->getTranslatePeriod($this->period) . "\n";
        }
    }
}

class Sale extends Advert implements AdvertInterface{

    public function getRoundPrice($price){
        if ($price>=1000000) {
            return $price/1000000;
        } else {
            return $price;
        }
    }

    public function getTitle(){
        if ($this->type=='dom') {
            return  "Продам " . $this->rooms . "-комнатный дом за " . $this->getRoundPrice($this->price) . " млн.тг\n"; 
        } else {
            return  "Продам " . $this->rooms . "-комнатную квартиру за " . $this->getRoundPrice($this->price) . " млн.тг\n"; 
        }
    }
}

foreach ($adverts as $advert) {
    if (isset($advert['period'])) {
        $adv = new Rent($advert['type'], $advert['price'], $advert['category'], $advert['rooms'], $advert['period']);
    } else {
        $adv = new Sale($advert['type'], $advert['price'], $advert['category'], $advert['rooms']);
    }
    echo $adv->getTitle();  
}
