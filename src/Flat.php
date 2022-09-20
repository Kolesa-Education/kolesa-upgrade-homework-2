<?php


namespace Advert;


class Flat extends LivingSpace
{
    private static int $floor;

    public function __construct(int $rooms, int $floor = 1)
    {
        parent::__construct($rooms, 'kvartira');
        self::$floor = $floor;
    }

    public static function getFloor(): int
    {
        return self::$floor;
    }
}
