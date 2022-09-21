<?php


namespace Advert;


class Flat extends LivingSpace
{
    protected int $floor;

    public function __construct(int $rooms, int $floor = 1)
    {
        parent::__construct($rooms);
        $this->floor = $floor;
    }

    public function formatTitle(): string
    {
        return "комнатную квартиру на {$this->floor} этаже";
    }
}
