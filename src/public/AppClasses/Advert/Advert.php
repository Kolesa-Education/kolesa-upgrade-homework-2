<?php

namespace AppClasses\Advert;

use \AppClasses\Catalog\ObjectToAdvert as ObjectToAdvert;

/**
 * Advert представляет собой абстрактное представление объекта рекламы. 
 * 
 * Имеет 2 основных атррибута: ценник (класс PriceTag) 
 * и обьект который рекламируется (интерфейс ObjectToAdvert)
 * 
 * Он имеет два дочерних класса, таких как «RentAdvert» и «SaleAdvert», 
 * которые являются объектами с определенной категорией. 
 * По мере роста проекта мы можем легко добавлять новые категории.
 */
abstract class Advert
{
    protected Tags\PriceTag $price;
    protected  ObjectToAdvert $advertObject;
    abstract public function getTitle(): string;
}
