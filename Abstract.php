<?php

interface Title{
    public function getTitle(): string;
}

abstract class Advert
{
    protected $rooms;
    protected $category;
    protected $price;
    protected $type;
    protected $period;

    protected function getPrice()
    {
        $priceSize = log10($this->price);
        if ($priceSize >= 6 && $this->price % 10 ** 5 == 0) {
            $advertPrice = ($this->price / 10 ** 6) . " млн. тг";
        } elseif ($priceSize >= 3 && $priceSize <= 6 && $this->price % 10 ** 2 == 0) {
            $advertPrice = (string) ($this->price / 10 ** 3) . " тыс. тг";
        } else {
            $advertPrice = (string) ((int) $this->price) . " тг";
        }
        return $advertPrice;
    }

    protected function getType()
    {
        if ($this->type == "dom") {
            $advertType = "комнатный дом";
        } elseif ($this->type == "kvartira") {
            $advertType = "комнатную квартиру";
        } else {
            $advertType = $this->type;
        }
        return $advertType;
    }

    protected function getPeriod()
    {
        if ($this->period == "month") {
            $advertPeriod = "в месяц";
        } elseif ($this->period == "day") {
            $advertPeriod = "в сутки";
        } else {
            $advertPeriod = $this->period;
        }
        return $advertPeriod;
    }
}

class SaleAdvert extends Advert implements Title
{
    public function __construct(int $rooms = NULL, int $price = NULL, string $type = NULL)
    {
        $this->rooms = $rooms;
        $this->price = $price;
        $this->type = $type;
    }

    public function getTitle(): string
    {
        $advertPrice = $this->getPrice();
        $advertType = $this->getType();

        return "Продам $this->rooms-$advertType за $advertPrice" . "<br>";
    }
}

class RentAdvert extends Advert implements Title
{
    public function __construct(int $rooms = NULL, int $price = NULL, string $type = NULL, string $period = NULL)
    {
        $this->rooms = $rooms;
        $this->price = $price;
        $this->type = $type;
        $this->period = $period;
    }

    public function getTitle(): string
    {

        $advertPrice = $this->getPrice();
        $advertPeriod = $this->getPeriod();
        $advertType = $this->getType();

        return "Сдам $this->rooms-$advertType за $advertPrice $advertPeriod" . "<br>";
    }
}