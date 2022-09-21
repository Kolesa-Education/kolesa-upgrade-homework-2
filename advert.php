<?php


abstract class advertClass
{
    protected $rooms;
    protected $category;
    protected $price;
    protected $type;
    protected $period;

    public function __construct($rooms, $category, $price, $type)
    {
        $this->setRooms($rooms);
        $this->setCategory($category);
        $this->setPrice($price);
        $this->setType($type);
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
    public function getRooms()
    {
        return $this->rooms;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        if ($category == "sale") {
            $this->category = "Продам";
        };
        if ($category == "rent") {
            $this->category = "Сдам";
        }
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        if ($price < 999999) {
            $this->price = "за " . number_format($price, 0, ' ', ' ') . " " . "тг";
        };
        if ($price > 999999) {
            $this->price = "за " . $price / 1000000 . " " . "млн. тг";
        }
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        if ($type == "dom") {
            $this->type = "-комнатный дом";
        };
        if ($type == "kvartira") {
            $this->type = "-комнатную квартиру";
        }
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    abstract public function getTitle();
};


