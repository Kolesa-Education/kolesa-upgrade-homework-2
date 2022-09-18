<?php

interface Advert 
{
    public function getTitle(): string;
}

abstract class HouseAdvert implements Advert
{
    protected int $rooms;
    protected string $category;
    protected int $price;
    protected string $period;

    public function __construct($rooms, $category, $price, $period)
    {
        $this->rooms = $rooms;
        $this->category = $category;
        $this->price = $price;

        if (!is_null($period)) {
            $this->period = $period;
        }
    }

    protected function getPriceForTitle(): string 
    {
        if ($this->price >= 1000000000) {
            return (string)$this->price/100000000 . "млрд. тг";
        }

        if ($this->price >= 1000000) {
            return (string)$this->price/1000000 . "млн. тг";
        }

        return (string)$this->price . "тг";
    }
}

class CottageAdvert extends HouseAdvert 
{
    public function getTitle(): string 
    {
        if ($this->category === "rent") {
            if ($this->period === "month") {
                return sprintf("Сдам %d-комнатный дом за %s в месяц", $this->rooms, $this->getPriceForTitle());
            }

            return sprintf("Сдам %d-комнатный дом за %s в день", $this->rooms, $this->getPriceForTitle());
        }

        return sprintf("Продам %d-комнатный дом за %s", $this->rooms, $this->getPriceForTitle());
    }
}

class FlatAdvert extends HouseAdvert
{
    public function getTitle(): string 
    {
        if ($this->category === "rent") {
            if ($this->period == "month") {
                return sprintf("Сдам %d-комнатную квартиру за %s в месяц", $this->rooms, $this->getPriceForTitle());
            }

            return sprintf("Сдам %d-комнатную квартиру за %s в день", $this->rooms, $this->getPriceForTitle());
        }

        return sprintf("Продам %d-комнатную квартиру за %s", $this->rooms, $this->getPriceForTitle());
    }
}

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
];

$houseAdverts = array();

foreach ($adverts as $item) {
    if (!isset($item['period'])) {
        $item['period'] = null;
    }
    switch ($item['type']) {
        case "dom":
            $object = new CottageAdvert($item['rooms'], $item['category'], $item['price'], $item['period']);
            break;
        case "kvartira":
            $object = new FlatAdvert($item['rooms'], $item['category'], $item['price'], $item['period']);
            break;
    }
    $houseAdverts[] = $object;
}

foreach ($houseAdverts as $item) {
    echo sprintf("%s\n", $item->getTitle());
}