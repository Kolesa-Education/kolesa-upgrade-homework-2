<?php

namespace Advert;

include_once 'Category.php';

class Sale extends Category
{
    public function getTitle(LivingSpace $livingSpace, string $formatStringPrice): string
    {
        $text = $this->formatHouseOrFlatTitle($livingSpace);

        return "Продам {$livingSpace->getRooms()}-{$text} за {$formatStringPrice} тг";
    }
}
