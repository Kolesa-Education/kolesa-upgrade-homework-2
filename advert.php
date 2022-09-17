<?php

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
];

abstract class Advert
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
}

;

class SaleAndRent extends Advert
{
    public function __construct($rooms, $category, $price, $type, $period = null)
    {
        parent::__construct($rooms, $category, $price, $type);
        $this->setPeriod($period);
    }

    /**
     * @param mixed|null $period
     */
    public function setPeriod($period)
    {
        if ($period == "month") {
            $this->period = 'в месяц';
        } elseif ($period == "day") {
            $this->period = 'в месяц';
        } else {
            $this->period = null;
        }
    }

    /**
     * @return mixed|null
     */
    public function getPeriod()
    {
        return $this->period;
    }
    public function getTitle()
    {
        if (!isset($this->period)) {
            return "$this->category $this->rooms$this->type $this->price" . PHP_EOL;
        } else {
            return "$this->category $this->rooms$this->type $this->price $this->period" . PHP_EOL;
        }
    }
}

foreach ($adverts as $advert) {
    if (!isset($advert['period'])) {
        $saleAndRent = new SaleAndRent($advert['rooms'], $advert['category'], $advert['price'], $advert['type']);
    } else {
        $saleAndRent = new SaleAndRent($advert['rooms'], $advert['category'], $advert['price'], $advert['type'], $advert['period']);
    }
    echo $saleAndRent->getTitle();
}