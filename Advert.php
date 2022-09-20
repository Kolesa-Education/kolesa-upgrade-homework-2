<?php

abstract class Advert
{
    protected $rooms;
    protected $category;
    protected $price;
    protected $type;

    /**
     * @param $rooms
     * @param $category
     * @param $price
     * @param $type
     */
    public function __construct($rooms, $category, $price, $type)
    {
        $this->rooms = $rooms;
        $this->category = $category;
        $this->price = $price;
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getRooms()
    {
        return $this->rooms;
    }

    /**
     * @param mixed $rooms
     */
    public function setRooms($rooms)
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
    public function setCategory($category)
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
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}