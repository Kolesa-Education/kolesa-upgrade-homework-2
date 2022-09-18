<?php

class Advert
{
    protected $rooms;
    protected $price;

    public function setRooms(int $rooms)
    {
        $this->rooms = $rooms;
    }
    public function setPrice(int $price)
    {
        $this->price = $price;
    }

    public function getTitle()
    {
        print_r("Продам {$this->rooms}-комнатный дом за {$this->price}");
    }
}

$home = new Advert();
$home->setRooms(5);
$home->setPrice(150000);
$home->getTitle();
