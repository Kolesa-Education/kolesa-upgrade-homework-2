<?php

namespace AppClasses\Advert;

use \AppClasses\Catalog\ObjectToAdvert as ObjectToAdvert;

/**
 * RentAdvert дочерный класс абстрактого класса Advert. 
 * 
 * RentAdvert представляетс собой класс обьектов который сдается на
 * определенный период (имеет тег period класса PeriodTag).
 * 
 */
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
