<?php

namespace App\Adverts;

abstract class Advert
{
    protected int $price;
    protected string $estateType;
    protected int $roomsCount;

    public function __construct(int $price, string $estateType, int $roomsCount)
    {
        $this->price = $price;
        $this->estateType = $estateType;
        $this->roomsCount = $roomsCount;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getEstateType(): string
    {
        return $this->estateType;
    }

    public function getRoomsCount(): int
    {
        return $this->roomsCount;
    }

    public function getStringifyPrice(): string
    {
        if ($this->price > 1_000_000) {
            return (string) round($this->price / 1_000_000, 2) . " млн. тг";
        }
        return (string) number_format($this->price, 0, '.', ' ') . ' тг';
    }

    public function getStringifyRoomsCount(): string
    {
        return match ($this->estateType) {
            'kvartira' => (string) $this->roomsCount . '-комнатную квартиру за',
            'dom' => (string) $this->roomsCount . '-комнатный дом за'
        };
    }

    abstract public function getTitle(): string;
}
