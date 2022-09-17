<?php

namespace App\Adverts;

class SaleAdvert extends Advert
{
    public function getTitle(): string
    {
        return implode(' ', [
            ' - Продам',
            $this->getStringifyRoomsCount(),
            $this->getStringifyPrice()
        ]);
    }
}
