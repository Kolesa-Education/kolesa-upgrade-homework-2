<?php

namespace AppClasses\Advert;

use \AppClasses\Catalog\ObjectToAdvert as ObjectToAdvert;

abstract class Advert
{
    protected Tags\PriceTag $price;
    protected  ObjectToAdvert $advertObject;
    abstract public function getTitle(): string;
}
