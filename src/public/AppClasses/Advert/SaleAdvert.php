<?php

namespace AppClasses\Advert;

use \AppClasses\Catalog\ObjectToAdvert as ObjectToAdvert;

class SaleAdvert extends Advert
{

    public function __construct(int $price, ObjectToAdvert $object)
    {
        $this->price = new Tags\PriceTag($price);
        $this->advertObject = $object;
    }

    public  function getTitle(): string
    {
        return "Продам " . $this->advertObject->getProportyMsg() . " за " . $this->price->getPriceTagMsg();
    }
}
