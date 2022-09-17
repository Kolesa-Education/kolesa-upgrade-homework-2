<?php

interface OutPut {
    public function getTitle();
    public function getType($type, $rooms);
    public function getPrice($price);
}

abstract class Advert implements OutPut{
    protected $type;
    protected $price;
    protected $rooms;

    public function __construct(array $arguments = array()) {
        if (!empty($arguments)) {
            foreach ($arguments as $property => $argument) {
                $this->{$property} = $argument;
            }
        }
    }

    public function getType($type, $rooms)
    {
        switch ($type){
            case "dom":
                return $rooms . "-комнатный дом ";
            case "kvartira":
                return $rooms . "-комнатную квартиру ";
        }
        return null;
    }

    public function getPrice($price)
    {
        if ($price >= 1000000) {
            return "за " . ($price / 1000000) . " млн тг";
        }

        if ($price >= 1000) {
            return "за " . ($price / 1000) . " 000" . " тг";
        }

        return "за " . $price . " тг";
    }


}

class Sale extends Advert
{

    public function getTitle()
    {
        echo "Продам " . $this->getType($this->type, $this->rooms) . $this->getPrice($this->price) . PHP_EOL;
    }

}

class Rent extends Advert
{
    public $period;
    public function getTitle()
    {
        echo "Сдам " . $this->getType($this->type, $this->rooms) . $this->getPrice($this->price) . $this->getPeriod($this->period) . PHP_EOL;

    }

    private function getPeriod($period){
        switch ($period){
            case "month":
                return " в месяц";
            case "day":
                return " в сутки";
        }
        return null;
    }

}

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'day'],
];

$objAdverts = array();

foreach ($adverts as $value){
    switch ($value['category']){
        case "sale":
            $obj = new Sale($value);
            break;
        case "rent":
            $obj = new Rent($value);
            break;
    }
    $objAdverts[] = $obj;

}

foreach ($objAdverts as $obj){
    $obj->getTitle();
}