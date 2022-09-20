<?php
require_once 'Advert.php';
require_once 'Service/AdvertOptions.php';

class Sale extends Advert implements AdvertOptions
{

    public function __construct($rooms, $category, $price, $type)
    {
        parent::__construct($rooms, $category, $price, $type);
    }

    public function translatePeriod($period){
    }

    public function changePrice($price){
        return $price >= 1000000 ? ($price / 1000000) : $price;
    }

    function getTitle()
    {
        if ($this->type == 'dom') {
            return "Продам " . $this->rooms . "-комнатный дом за " . $this->changePrice($this->price) . " млн. тг." . PHP_EOL;
        } else {
            return "Продам " . $this->rooms . "-комнатную квартиру за " . $this->changePrice($this->price) . " млн. тг. " . PHP_EOL;
        }
    }
}
