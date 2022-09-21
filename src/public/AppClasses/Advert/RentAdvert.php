<?php

namespace AppClasses\Advert;

use \AppClasses\Catalog\ObjectToAdvert as ObjectToAdvert;

class RentAdvert extends Advert
{

    protected Tags\PeriodTag $period;

    public function __construct(int $price, string $period, ObjectToAdvert $object)
    {
        $this->price = new Tags\PriceTag($price);
        $this->advertObject = $object;
        $this->period = new Tags\PeriodTag($period);
    }

    public function getTitle(): string
    {

        return "Сдам " . $this->advertObject->getProportyMsg() . " за " . $this->price->getPriceTagMsg() . $this->period->getPeriodTagMsg();
    }
}
