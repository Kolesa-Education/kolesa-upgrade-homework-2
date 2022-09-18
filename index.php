<?php

class Advert
{
    public int $rooms;
    public string $category;
    public int $price;
    public string $type;
    public string $period = '';

    public function __construct(array $advert)
    {
        $this->rooms = $advert['rooms'];
        $this->category = $advert['category'];
        $this->price = $advert['price'];
        $this->type = $advert['type'];
        if (isset($advert['period'])) {
            $this->period = $advert['period'];
        }
    }

    public function getCategory(): string
    {
        if ($this->category === 'sale') {
            return 'Продам ';
        } else {
            return 'Сдам ';
        }
    }

    public function getPrice(): string
    {
        if ($this->price < 1000) {
            return sprintf($this->price) . ' тг';
        }

        if ($this->price < 1000000) {
            $price = $this->price / 1000;
            return number_format($price, 3, " ") . ' тыс.тг';
        }

        if ($this->price < 1000000000) {
            $price = $this->price / 1000000;
            return number_format($price, 1) . ' млн.тг';
        }

        $price = $this->price / 1000000000;

        return number_format($price) . ' млрд.тг';
    }

    public function getType(): string
    {
        if ($this->type === 'dom') {
            return '-комнатный дом за ';
        } else if($this->type === 'kvartira'){
            return '-комнатную квартиру за ';
        }
    }

    public function rentPeriod(): string
    {
        if ($this->period === 'month') {
            return ' в месяц';
        } else if ($this->period === 'day') {
            return ' в сутки';
        } else if ($this->period === 'week') {
            return ' в неделю';
        } else if ($this->period === 'year') {
            return ' в год';
        } else {
            return '';
        }
    }

    public function getTitle(): void
    {
        $category = $this->getCategory();
        $type = $this->getType();
        $price = $this->getPrice();
        $period = $this->rentPeriod();

        echo "• $category $this->rooms  $type  $price  $period <br>";
        
    }
}

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
];

foreach ($adverts as $advert) {
    (new Advert($advert))->getTitle();
}
