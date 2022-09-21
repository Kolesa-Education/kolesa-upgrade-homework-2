<?php

namespace AppClasses\Catalog;

class Appartment extends Residency implements ObjectToAdvert

{

    public function __construct(int $rooms)
    {
        $this->rooms = $rooms;
    }

    public function getProportyMsg(): string
    {
        return (string)$this->rooms . "-комнатную квартиру";
    }
}
