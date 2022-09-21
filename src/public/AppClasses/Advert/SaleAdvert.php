<?php

namespace AppClasses\Advert;

use \AppClasses\Catalog\ObjectToAdvert as ObjectToAdvert;

/**
 * SaleAdvert дочерный класс абстрактого класса Advert. 
 * 
 * Saledvert представляетс собой класс обьектов который продается.
 */
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
