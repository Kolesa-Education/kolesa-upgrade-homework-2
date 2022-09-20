<?php
header('Content-type: text/plain');

/**
 * Абстрактный класс Объявления
 */
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
        $this->setRooms($rooms);
        $this->setCategory($category);
        $this->setPrice($price);
        $this->setType($type);
    }

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

/**
 *  Класс объявлений категории Продажа
 */
class SaleAdvert extends Advert
{
    protected const CATEGORY = 'sale';
    protected const SALE_DOM = 'dom';

    public function __construct(int $rooms, float $price, string $type)
    {
        parent::__construct($rooms, self::CATEGORY, $price, $type);

        $this->setPrice($price > 1000000 ? ($price / 1000000) : number_format($price, 0));
    }

    public function isTypeDom()
    {
        return self::SALE_DOM === $this->type;
    }

    public function getTitle(): string
    {
        if ($this->isTypeDom()) {
            return sprintf("Продам %s-комнатный дом за %d млн. тг %s",
                $this->getRooms(), $this->getPrice(), PHP_EOL);
        } else {
            return sprintf(
                "Продам %s-комнатную квартиру за %d млн. тг %s" ,
                $this->getRooms(), $this->getPrice(), PHP_EOL);
        }
    }
}

/**
 * Класс объявлений категории Аренда
 */
class RentAdvert extends Advert
{
    protected const CATEGORY = 'rent';
    protected const PERIOD_MONTH = 'month';
    protected  $period;

    public function __construct(int $rooms, float $price, string $type, string $period)
    {
        parent::__construct($rooms, self::CATEGORY, $price, $type);

        $this->setPeriod($period);
    }

    function setPeriod($period)
    {
        $this->period = $period;
    }

    function getPeriod()
    {
        return $this->period;
    }
    public function isPeriodMohth()
    {
        return self::PERIOD_MONTH === $this->period;
    }

    public function getTitle(): string
    {
        if ($this->isPeriodMohth()) {
            return sprintf("Сдам %s-комнатную квартиру за %d тг в месяц %s" ,
                $this->getRooms(), $this->getPrice(), PHP_EOL);
        } else {
            return sprintf("Сдам %s-комнатную квартиру за %d тг в сутки %s" ,
                $this->getRooms(), $this->getPrice(), PHP_EOL);
        }
    }
}

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
];

foreach ($adverts as $advert) {
    if ($advert['category'] == 'sale') {
        $advert = new SaleAdvert($advert['rooms'], $advert['price'], $advert['type']);
        echo $advert->getTitle();
    } else {
        $advert = new RentAdvert($advert['rooms'], $advert['price'], $advert['type'], $advert['period']);
        echo $advert->getTitle();
    }
}