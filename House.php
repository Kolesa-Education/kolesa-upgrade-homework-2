<?php


namespace Advert;

include_once 'LivingSpace.php';

class House extends LivingSpace
{
    private float $landArea;

    public function __construct(int $rooms, float $landArea = 0)
    {
        parent::__construct($rooms, 'dom');
        $this->landArea = $landArea;
    }

    public function getLandArea(): float
    {
        return $this->landArea;
    }
}