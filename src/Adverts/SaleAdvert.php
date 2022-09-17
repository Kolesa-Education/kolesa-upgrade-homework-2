<?php

namespace App\Adverts;

use App\Adverts\Advert;

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
