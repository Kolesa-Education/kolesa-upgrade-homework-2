<?php

require_once 'interfaces/RealEstateAdvertInterface.php';
require_once 'interfaces/Rentable.php';

// С задумкой что будут объявления кроме недвижимости
abstract class Advert implements RealEstateAdvertInterface, Rentable
{
    public function __construct(
        protected $rooms = null,
        protected $category = null,
        protected $type = null,
        protected $price = 0,
        protected $period = null
    ) {
    }

    public function getTitle(): string
    {
        return 'Новое объявление!';
    }

    public function getRooms(): int
    {
        return $this->rooms;
    }

    public function setRooms(int $rooms): void
    {
        $this->rooms = $rooms;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getPeriod(): string
    {
        return $this->period ?: 'Объявление не является арендой!';
    }

    public function setPeriod(string $period): void
    {
        $this->period = $period;
    }
}