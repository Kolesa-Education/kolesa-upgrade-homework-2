<?php

abstract class Advert
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
}

interface Title
{
    public function getTitle();
}

class Sale extends Advert implements Title
{
    public function getTitle()
    {
        print_r("Продам {$this->rooms}-комнатный дом за {$this->price}\n");
    }
}

class Rent extends Advert implements Title
{
    public function getTitle()
    {
        print_r("Сдам {$this->rooms}-комнатный дом за {$this->price} в мес\n");
    }
}

$sale = new Sale();
$sale->setRooms(5);
$sale->setPrice(150000);
$sale->getTitle();
$rent = new Rent();
$rent->setRooms(5);
$rent->setPrice(150000);
$rent->getTitle();
