<?php
declare(strict_types=1);

abstract class Advert {
    protected int $rooms;
    protected string $category;
    protected int $price;


    public function __construct(int $rooms,string $category, int $price)
    {
        $this->rooms = $rooms;
        $this->category = $category;
        $this->price = $price;
    }


    public function getRooms()
    {
        return $this->rooms;
    }

    /**
     * @param mixed $rooms
     */
    public function setRooms($rooms): void
    {
        $this->rooms = $rooms;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category): void
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }


    abstract public function getTitle();
}