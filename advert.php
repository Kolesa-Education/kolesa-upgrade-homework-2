<?php

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
];

interface advertInterface
{
    public function getTitle();
}

abstract class Advert
{
    protected $rooms;
    protected $price;
    protected $type;

    public function __construct($rooms, $price, $type)
    {
        $this->setRooms($rooms);
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
     * @param mixed $price
     */
    public function setPrice($price)
    {
        if ($price < 999999 && is_numeric($price)) {
            $this->price = "за " . number_format($price, 0, ' ', ' ') . " " . "тг";
        } elseif ($price > 999999 && is_numeric($price)) {
            $this->price = "за " . $price / 1000000 . " " . "млн. тг";
        } else {
            $this->price = "Неправильный ввод параметра";
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
        } elseif ($type == "kvartira") {
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
}

class rentHouse extends Advert implements advertInterface
{
    protected $period;
    protected $category;

    public function __construct($rooms, $price, $type, $period, $category)
    {
        parent::__construct($rooms, $price, $type);
        $this->setPeriod($period);
        $this->setCategory($category);
    }

    /**
     * @param mixed $period
     */
    public function setPeriod($period)
    {
        if ($period == "month") {
            $this->period = 'в месяц';
        } else {
            $this->period = 'в сутки';
        }
    }

    /**
     * @return mixed|null
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = "Сдам";
    }

    /**
     * @return mixed|null
     */
    public function getCategory()
    {
        return $this->category;
    }

    public function getTitle()
    {
        return "$this->category $this->rooms$this->type $this->price $this->period" . PHP_EOL;
    }
}

class saleHouse extends Advert implements advertInterface
{
    protected $category;

    public function __construct($rooms, $price, $type, $category)
    {
        parent::__construct($rooms, $price, $type);
        $this->setCategory($category);
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = "Продам";
    }

    /**
     * @return mixed|null
     */
    public function getCategory()
    {
        return $this->category;
    }

    public function getTitle()
    {
        return "$this->category $this->rooms$this->type $this->price" . PHP_EOL;
    }
}

//$rentHouse = new rentHouse(5, 250000, 'kvartira', "day", "rent");
//echo $rentHouse->getTitle();

foreach ($adverts as $advert) {
    if (!isset($advert['period'])) {
        $saleHouse = new saleHouse($advert['rooms'], $advert['price'], $advert['type'], $advert['category']);
        echo $saleHouse->getTitle();
    }
    if (isset($advert['period'])){
        $rentHouse = new rentHouse($advert['rooms'], $advert['price'], $advert['type'], $adverts['period'], $advert['category']);
        echo $rentHouse->getTitle();
    }
}