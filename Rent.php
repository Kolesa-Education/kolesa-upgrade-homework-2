<?php
require_once 'Advert.php';
require_once 'Service/AdvertOptions.php';

class Rent extends Advert implements AdvertOptions
{
    public $period;

    public function __construct($rooms, $category, $price, $type, $period)
    {
        $this->period = $period;
        parent::__construct($rooms, $category, $price, $type, $period);
    }

    public function translatePeriod($period){
        return $period == 'day' ? "в сутки." : "в месяц.";
    }

    public function changePrice($price){
    }

    function getTitle()
    {
        if ($this->type == 'dom') {
            return "Сдам " . $this->rooms . "-комнатный дом за " . $this->price . " тг." . PHP_EOL;
        } else {
            return "Сдам " . $this->rooms . "-комнатную квартиру за " . $this->price . " тг. " . $this->translatePeriod($this->period) . PHP_EOL;
        }
    }
}