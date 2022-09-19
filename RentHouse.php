<?php

class RentHouse extends House
{
    protected $period;

    public function __construct($rooms, $price, $type,$period)
    {
        parent::__construct($rooms, $price, $type);
        $this->period = $period;
    }

    public function getPeriod()
    {
        return $this->period;
    }

    public function setPeriod($period)
    {
        $this->period = $period;
    }

    public function getTitle()
    {
        $trip = "";
        $title = "Сдам %d -комнатную квартиру за %d тг в %s";
        if ($this->getPeriod() == 'month'){
            $trip = "месяц";
        }
        else{
            $trip = "сутки";
        }
        return sprintf($title,$this->getRooms(),$this->getPrice(),$trip)." <br>";
    }

}