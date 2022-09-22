<?php

class Advert
{
    public int $rooms;
    public string $category = "";
    public int $price;
    public string $type = "";
    public string $period = "";

    public function __construct(array $advert) {
        $this->rooms = $advert["rooms"];
        $this->category = $advert["category"];
        $this->price = $advert["price"];
        $this->type = $advert["type"];
        if (isset($advert["period"])) {
            $this->period = $advert["period"];
        }
    }

    private function getCategory(): string {
        if ($this->category === "sale") {
            return "Продам";
        } return "Сдам";
    }

    private function getType(): string {
        if ($this->type === "dom") {
            return "-комнатный дом за";
        } return "-комнатную квартиру за";
    }

    private function getPrice(): string {
        if ($this->price < 1000) {
            return sprintf($this->price) . " тг";
        }
        if ($this->price < 1000000) {
            $price = $this->price / 1000;
            return number_format($price, 3, " ") . " тг";
        }
        if ($this->price < 1000000000) {
            $price = $this->price / 1000000;
            return number_format($price, 1) . " млн.тг";
        }
    }

    private function getPeriod(): string {
        if ($this->period === "month") {
            return "в месяц";
        } if ($this->period === "day") {
            return "в сутки";
        } else {
            return "";
        }
    }

    public function getTitle(): string {
        $category = $this->getCategory();
        $type = $this->getType();
        $price = $this->getPrice();
        $period = $this->getPeriod();
        return "$category $this->rooms$type $price $period";
    }
}

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
];

foreach ($adverts as $advert) {
    echo (new Advert($advert))
    ->gettitle() . PHP_EOL;
}