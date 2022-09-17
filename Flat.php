<?php


namespace Advert;

include_once 'LivingSpace.php';

class Flat extends LivingSpace
{
    private int $floor;

    public function __construct(int $rooms, int $floor = 1)
    {
        parent::__construct($rooms, 'kvartira');
        $this->floor = $floor;
    }

    public function getFloor(): int
    {
        return $this->floor;
    }
}