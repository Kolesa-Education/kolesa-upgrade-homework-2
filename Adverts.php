<?php

interface Adverts
{
    public function getTitle(): string;
}

abstract class House
{
    protected $price;
    protected $type;
    protected $rooms;
    protected $category;

    public function __construct($price, $rooms, $type, $category)
    {
        $this->setCategory($category);
        $this->setPrice($price);
        $this->setRooms($rooms);
        $this->setType($type);
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setType($type)
    {
        if ($type === 'kvartira') {
            $type = 'квартиру';
        } else {
            $type = 'дом';
        }
        $this->type = $type;
    }

    public function setRooms($rooms)
    {
        $this->rooms = $rooms;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getPrice()
    {
        if ($this->price >= 1e6) {
            $this->price /= 1e6;
            $this->price .= " млн";
        }
        return $this->price . " тг";
    }

    public function getType()
    {
        return $this->type;
    }

    public function getRooms()
    {
        return $this->rooms;
    }

}

class Rent extends House implements Adverts
{
    protected $period;

    public function __construct($price, $rooms, $type, $category, $period)
    {
        parent::__construct($price, $rooms, $type, $category);
        $this->setPeriod($period);
    }

    public function setPeriod($period)
    {
        if ($period == "month") {
            $period = 'месяц';
        } else {
            $period = 'сутки';
        }
        $this->period = $period;
    }

    public function getPeriod()
    {
        return $this->period;
    }

    public function getTitle(): string
    {
        return sprintf("Сдам %s-комнатную %s за %s в %s <br>",
            $this->getRooms(), $this->getType(), $this->getPrice(), $this->getPeriod());
    }
}

class Sale extends House implements Adverts
{
    public function getTitle(): string
    {
        return sprintf("Продам %s-комнатную %s за %s <br>",
            $this->getRooms(), $this->getType(), $this->getPrice());
    }
}

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
];

foreach ($adverts as $advert) {
    if ($advert['category'] == 'sale') {
        $advert = new Sale($advert['price'], $advert['rooms'], $advert['type'], $advert['category']);
        echo $advert->getTitle();
    } else {
        $advert = new Rent($advert['price'], $advert['rooms'], $advert['type'], $advert['category'], $advert['period']);
        echo $advert->getTitle();
    }
}
