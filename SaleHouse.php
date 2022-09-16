<?php

class SaleHouse extends House
{
    public function __construct($rooms, $price, $type)
    {
        parent::__construct($rooms, $price, $type);
    }


    public function getTitle()
    {
        $this->setPrice($this->getPrice()/1000000);
        return "Продам $this->rooms -комнатный дом за $this->price млн. тг <br>";
    }
}