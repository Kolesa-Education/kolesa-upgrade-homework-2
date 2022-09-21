<?php

class Advert
{
    private $rooms;
    private $category;
    private $price;
    private $type;
    private $period;
    public function __construct($rooms,  $category,  $price,  $type, $period)
    {
        $this->rooms = $rooms;
        $this->category = $category;
        $this->price = $price;
        $this->type = $type;
        $this->period = $period;
    }
    public function getTitle()
    {
        if ($this->type == 'dom') {
            return "Продам " . $this->rooms . "-комнатный дом за " . number_format($this->price / 1000000, 1) . ' млн. тг' . "<br>";
        }
        if ($this->type == 'kvartira' && $this->period == NULL) {
            return "Продам " . $this->rooms . "-комнатную квартиру за " . number_format($this->price / 1000000, 1) . ' млн. тг' . "<br>";
        }
        if ($this->period == 'month') {
            return "Сдам " . $this->rooms . "-комнатную квартиру за " . number_format($this->price, 0, '', ' ') . " тг в месяц" . "<br>";
        } else {
            return "Сдам " . $this->rooms . "-комнатную квартиру за " . number_format($this->price, 0, '', ' ') . " тг в сутки" . "<br>";
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
    $advert = new Advert($advert['rooms'], $advert['category'], $advert['price'], $advert['type'], $advert['period'] ?? NULL);
    echo $advert->getTitle();
}
