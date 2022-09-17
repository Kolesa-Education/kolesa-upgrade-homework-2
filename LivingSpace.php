<?php


namespace Advert;


abstract class LivingSpace
{
    private int $rooms;
    private string $type;

    public function __construct(int $rooms, string $type)
    {
        $this->rooms = $rooms;
        $this->type = $type;
    }

    public function getRooms(): int
    {
        return $this->rooms;
    }

    public function getType(): string
    {
        return $this->type;
    }
}