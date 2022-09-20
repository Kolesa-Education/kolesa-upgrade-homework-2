<?php

namespace Advert;

abstract class Category
{
    public abstract function getTitle(LivingSpace $livingSpace, string $formatStringPrice): string;

    public function formatHouseOrFlatTitle(LivingSpace $livingSpace): string
    {
        if ($livingSpace instanceof House) {
            $landArea = House::getLandArea();
            $text = "комнатный дом с участком {$landArea} кв.м";
        } else {
            $floor = Flat::getFloor();
            $text = "комнатную квартиру на {$floor} этаже";
        }

        return $text;
    }
}
