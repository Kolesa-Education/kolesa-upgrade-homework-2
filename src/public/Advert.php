<?php

abstract class Advert
{
    protected $price;
    protected $advertObject;
    abstract public function getTitle();
}

class RentAdvert extends Advert
{

    private PeriodTag $period;

    public function __construct($givenPrice, $givenPeriod, ObjectToAdvert $object,)
    {
        $this->price = new PriceTag($givenPrice);
        $this->advertObject = $object;
        $this->period = new PeriodTag($givenPeriod);
    }

    public function getTitle()
    {

        return "Сдам " . $this->advertObject->getProportyMsg() . " за " . $this->price->getPriceTagMsg() . $this->period->getPeriodTagMsg();
    }
}

class SaleAdvert extends Advert
{

    public function __construct($givenPrice, ObjectToAdvert $object,)
    {
        $this->price = new PriceTag($givenPrice);
        $this->advertObject = $object;
    }

    public  function getTitle()
    {
        return "Продам " . $this->advertObject->getProportyMsg() . " за " . $this->price->getPriceTagMsg();
    }
}


class PriceTag
{
    private $price;
    public function __construct($givenPrice)
    {
        $this->price =  $givenPrice;
    }

    public function getPriceTagMsg()
    {
        if ($this->price / 1000000 > 1) {
            return  (string)$this->price / 1000000 . " млн. тг";
        } else if ($this->price / 1000 > 1) {
            return  (string)$this->price / 1000 . " 000 тг";
        } else {
            return  (string)$this->price . " тг";
        }
    }
}

class PeriodTag
{
    private $period;
    public function __construct($givenPeriod)
    {
        $this->period = $givenPeriod;
    }

    public function getPeriodTagMsg()
    {
        if ($this->period == "month") {
            return  " в месяц";
        } else if ($this->period == "day") {
            return  " в сутки";
        }
    }
}
