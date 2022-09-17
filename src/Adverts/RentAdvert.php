<?php

namespace App\Adverts;

use App\Adverts\Advert;
use App\Estates\Estate;

class RentAdvert extends Advert
{
    private string $period;

    public function __construct(int $price, string $estateType, int $roomsCount, string $period)
    {
        parent::__construct($price, $estateType, $roomsCount);
        $this->period = $period;
    }

    public function getPeriod(): string
    {
        return $this->period;
    }

    public function getStringifyPeriod(): string
    {
        return match ($this->period) {
            'month' => 'в месяц',
            'day' => 'в сутки'
        };
    }

    public function getTitle(): string
    {
        return implode(' ', [
            ' - Сдам',
            $this->getStringifyRoomsCount(),
            $this->getStringifyPrice(),
            $this->getStringifyPeriod()
        ]);
    }
}
