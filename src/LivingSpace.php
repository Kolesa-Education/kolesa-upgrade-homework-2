<?php


namespace Advert;


abstract class LivingSpace
{
    private int $rooms;

    public abstract function formatTitle(): string;

    public function __construct(int $rooms)
    {
        $this->rooms = $rooms;
    }

    public function getRooms(): int
    {
        return $this->rooms;
    }
}
