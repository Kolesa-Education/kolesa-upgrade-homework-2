<?php


namespace Advert;


class House extends LivingSpace
{
    protected float $landArea;

    public function __construct(int $rooms, float $landArea = 0)
    {
        parent::__construct($rooms);
        $this->landArea = $landArea;
    }

    public function formatTitle(): string
    {
        return "комнатный дом с участком {$this->landArea} кв.м";
    }
}
