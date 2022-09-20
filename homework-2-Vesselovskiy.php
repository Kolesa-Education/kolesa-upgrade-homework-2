<?php

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'day'],
];
class Adverts
{
    private $rooms;
    private $category;
    private $price;
    private $type;
    private $period;
    public function __construct()
    {
        $this->rooms = 'rooms';
        $this->category = 'category';
        $this->price = 'price';
        $this->type = 'type';
        $this->period = 'period';
    }
    public function showPrivate()
    {
        echo "$this->rooms </br> $this->category </br> $this->price </br> $this->type </br> $this->period";
    }
    public function getTitle($input)
    {
        foreach ($input as $advert) {
            if ($advert['type'] == 'dom') {
                $this->rooms = $advert['rooms'] . '-комнатный ';
                $this->type = 'дом';
            } else {
                $this->rooms = $advert['rooms'] . '-комнатную ';
                $this->type = 'квартиру';
            }
            if ($advert['category'] == 'rent') {
                $this->category = 'Сдам ';
                $this->price = number_format($advert['price'], 0, '', ' ');
            } else {
                $this->category = 'Продам ';
                $this->price = number_format($advert['price'] / 1000000, 1);
            }
            if (isset($advert['period'])  && ($advert['period'] == 'day')) {
                $this->period = 'в сутки';
            } else {
                $this->period = 'в месяц';
            }
            if ($advert['category'] == 'sale') {
                echo $this->category, $this->rooms, $this->type, ' за ', $this->price, ' млн. тг </br>';
            } else {
                echo $this->category, $this->rooms, $this->type, ' за ', $this->price, ' тг в ', $this->period, '</br>';
            }
        }
    }
}
$titles = new Adverts;
$titles->getTitle($adverts);
// $titles->showPrivate();