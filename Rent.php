<?php

namespace Advert;

include_once 'Category.php';

class Rent extends Category
{
    private string $period;

    public function __construct(string $period)
    {
        if ($period == 'month') {
            $period = 'месяц';
        } elseif ($period == 'day') {
            $period = 'день';
        }

        $this->period = $period;
    }

    public function getTitle(LivingSpace $livingSpace, string $formatStringPrice): string
    {
        $text = $this->formatHouseOrFlatTitle($livingSpace);

        return "Сдам {$livingSpace->getRooms()}-{$text} за {$formatStringPrice} тг в {$this->period}";
    }
}
