<?php
require_once "AdvertInterface.php";

abstract class Advert implements AdvertInterface
{
    protected $type;
    protected $rooms = 1;
    protected $price;

    function __construct(string $type, int $rooms, int $price) {
        $this->type = $type;
        $this->rooms = $rooms;
        $this->price = $price;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getRooms(): int
    {
        return $this->rooms;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getType(): string
    {
        return $this->type;
    }
}