<?php


namespace Advert;


class House extends LivingSpace
{
    private static float $landArea;

    public function __construct(int $rooms, float $landArea = 0)
    {
        parent::__construct($rooms, 'dom');
        self::$landArea = $landArea;
    }

    public static function getLandArea(): float
    {
        return self::$landArea;
    }
}
