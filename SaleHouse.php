<?php

class SaleHouse extends House
{
    public function __construct($rooms, $price, $type)
    {
        parent::__construct($rooms, $price, $type);
    }

    public function getTitle()
    {
        $updPrice = $this->getPrice();
        $updPrice /=1000000;
        return "Продам $this->rooms -комнатный дом за $updPrice млн. тг <br>";
    }
}