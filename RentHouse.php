<?php

class RentHouse extends House
{
    private $period;

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
        if ($this->getPeriod() == 'month'){
            return "Сдам  $this->rooms -комнатную квартиру за $this->price тг в  месяц <br>";
        }else{
            return "Сдам  $this->rooms -комнатную квартиру за $this->price тг в  сутки \r\n";
        }
    }
}