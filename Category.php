<?php

namespace Advert;

abstract class Category
{
    public abstract function getTitle(LivingSpace $livingSpace, string $formatStringPrice): string;

    public function formatHouseOrFlatTitle(LivingSpace $livingSpace): string
    {
        if ($livingSpace instanceof House) {
            $text = 'комнатный дом';
        } else $text = 'комнатную квартиру';

        return $text;
    }
}
