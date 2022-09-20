<?php

class Advert
{
    protected $rooms;
	protected $category;
    protected $price;
    protected $type;
	
	public function __construct(int $rooms, string $category, float $price, string $type)
    {
        $this->rooms = $rooms;
		$this->category = $category;
        $this->price = $price;
        $this->type = $type;
    }

    public function formatPrice($price)
    {
        if ($price > 1000000)
            return round(($price / 1000000), 1) . ' млн. тг';
        if ($price > 1000)
            return number_format($price, 0, '.', ' ') . ' тг';
        return $price;
    }	
}

class saleAdvert extends Advert
{
    public function getTitle(): string
    {
        if ($this->type == 'dom') {
            return "Продам " . $this->rooms . "-комнатный дом за " . $this->formatPrice($this->price) . "<br>";
        } else {
            return "Продам " . $this->rooms . "-комнатную квартиру за " . $this->formatPrice($this->price) . "<br>";
        }
    }
}

class rentAdvert extends Advert
{
    protected $period;

    public function __construct(int $rooms, string $category, float $price, string $type, string $period)
    {
        parent::__construct($rooms, $category, $price, $type);
        $this->period = $period;
    }

    public function getTitle(): string
    {
        if ($this->period == 'month') {
            return "Сдам " . $this->rooms . "-комнатную квартиру за " . $this->formatPrice($this->price) . " в месяц" . "<br>";
        } else {
            return "Сдам " . $this->rooms . "-комнатную квартиру за " . $this->formatPrice($this->price) . " в сутки" . "<br>";
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
        $advert = new saleAdvert($advert['rooms'], $advert['category'], $advert['price'], $advert['type']);
        echo $advert->getTitle();
    } else {
        $advert = new rentAdvert($advert['rooms'], $advert['category'], $advert['price'], $advert['type'], $advert['period']);
        echo $advert->getTitle();
    }
}
