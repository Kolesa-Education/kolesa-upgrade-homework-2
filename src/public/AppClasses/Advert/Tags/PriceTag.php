<?php

namespace AppClasses\Advert\Tags;

/**
 * PeriodTag вспомогательные класс для представления ценика. 
 * обеспечивает эластичность изменения стоимости в заголовки объявлений.
 */
class PriceTag
{
    private int $price;
    public function __construct(int $price)
    {
        $this->price = $price;
    }

    public function getPriceTagMsg(): string
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
