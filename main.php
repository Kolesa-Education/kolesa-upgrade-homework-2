<?php

abstract class Advert
{

    private $price;
    private $type;
    private $rooms;

    public function __construct($price, $type, $rooms)
    {
        $this->price = $price;
        $this->type = $type;
        $this->rooms = $rooms;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getRoomsNum()
    {
        return $this->rooms;
    }

    public function getPriceStr()
    {
        if ($this->price > 1000000) {
            return round($this->price / 1000000, 2) . " млн. тг";
        }
        return number_format($this->price, 0, '.', ' ') . ' тг';
    }

    public function getRoomsNumStr()
    {
        if ($this->type == 'kvartira') {
            return $this->rooms . '-комнатную квартиру за';
        } elseif ($this->type == 'dom') {
            return $this->rooms . '-комнатный дом за';
        }
    }

    abstract public function getTitle();
}

class Rent extends Advert
{
    private $period;

    public function __construct($price, $type, $rooms, $period)
    {
        parent::__construct($price, $type, $rooms);
        $this->period = $period;
    }

    public function getPeriod()
    {
        return $this->period;
    }

    public function getPeriodStr()
    {
        switch ($this->period) {
            case 'month':
                return 'в месяц';
            case 'day':
                return 'в день';
            default:
                return '(период не указан)';
        }
    }

    public function getTitle()
    {
        return 'Сдам ' . $this->getRoomsNumStr() . ' ' . $this->getPriceStr() . ' ' . $this->getPeriodStr();
    }
}

class Sale extends Advert
{
    public function __construct($price, $type, $rooms)
    {
        parent::__construct($price, $type, $rooms);
    }

    public function getTitle()
    {
        return 'Продам ' . $this->getRoomsNumStr() . ' ' . $this->getPriceStr();
    }
}

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
];

function createAdvert(array $params)
{
    switch ($params['category']) {
        case 'sale':
            return new Sale($params['price'], $params['type'], $params['rooms']);
        case 'rent':
            return new Rent($params['price'], $params['type'], $params['rooms'], $params['period']);
        default:
            return null;
    }
}

foreach ($adverts as $advert) {
    echo createAdvert($advert)->getTitle() . PHP_EOL;
}