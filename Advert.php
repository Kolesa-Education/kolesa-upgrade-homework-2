<?php
header('Content-type: text/plain');

interface Price
{
    public function formatPrice($price);
}

abstract class Advert
{
    protected $rooms;
    protected $category;
    protected $price;
    protected $type;

    function setRooms($rooms)
    {
        $this->rooms = $rooms;
    }
    function getRooms()
    {
        return $this->rooms;
    }
    function setCategory($category)
    {
        $this->category = $category;
    }
    function getCategory()
    {
        return $this->category;
    }
    function setPrice($price)
    {
        $this->price = $price;
    }
    function getPrice()
    {
        return $this->price;
    }
    function setType($type)
    {
        $this->type = $type;
    }
    function getType()
    {
        return $this->type;
    }
    abstract public function getTitle(): string;
}

class saleAdvert extends Advert implements Price
{
    public function __construct(int $rooms, float $price, string $type)
    {
        $this->rooms = $rooms;
        $this->price = $price;
        $this->type = $type;
    }

    public function formatPrice($price)
    {
        if ($price > 1000000)
            return round(($price / 1000000), 1) . ' млн.';
        else if ($price > 1000)
            return number_format($price, 0, '.', ' ');

        return number_format($price);
    }

    public function getTitle(): string
    {
        if ($this->type == 'dom') {
            return "Продам " . $this->rooms . "-комнатный дом за " . $this->formatPrice($this->price) . " тг" . PHP_EOL;
        } else {
            return "Продам " . $this->rooms . "-комнатную квартиру за " . $this->formatPrice($this->price) . " тг" . PHP_EOL;
        }
    }
}

class rentAdvert extends Advert
{
    public $period;

    public function __construct(int $rooms, float $price, string $type, string $period)
    {
        $this->rooms = $rooms;
        $this->price = $price;
        $this->type = $type;
        $this->period = $period;
    }

    public function formatPrice($price)
    {
        if ($price > 1000000)
            return round(($price / 1000000), 1) . ' млн.';
        else if ($price > 1000)
            return number_format($price, 0, '.', ' ');

        return number_format($price);
    }

    function setPeriod($period)
    {
        $this->period = $period;
    }
    function getPeriod()
    {
        return $this->period;
    }

    public function getTitle(): string
    {
        if ($this->period == 'month') {
            return "Сдам " . $this->rooms . "-комнатную квартиру за " . $this->formatPrice($this->price) . " тг в месяц" . PHP_EOL;
        } else {
            return "Сдам " . $this->rooms . "-комнатную квартиру за " . $this->formatPrice($this->price) . " тг в сутки" . PHP_EOL;
        }
    }
}

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'day'],
];

foreach ($adverts as $advert) {
    if ($advert['category'] == 'sale') {
        $advert = new saleAdvert($advert['rooms'], $advert['price'], $advert['type']);
        echo $advert->getTitle();
    } else {
        $advert = new rentAdvert($advert['rooms'], $advert['price'], $advert['type'], $advert['period']);
        echo $advert->getTitle();
    }
}
