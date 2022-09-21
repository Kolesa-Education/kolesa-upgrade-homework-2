<?php
declare(strict_types=1);

abstract class Advert {
    protected int $rooms;
    protected int $price;
    protected string $type;

    /**
     * @param int $rooms
     * @param string $price
     * @param int $type
     */
    public function __construct(int $rooms, int $price, string $type)
    {
        $this->rooms = $rooms;
        $this->price = $price;
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getRooms(): int
    {
        return $this->rooms;
    }

    /**
     * @param int $rooms
     */
    public function setRooms(int $rooms): void
    {
        $this->rooms = $rooms;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }




    abstract public function getTitle();
}