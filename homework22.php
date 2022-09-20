<?php

abstract class Advert
{
    protected $rooms;
    protected $type;
    protected $price;
    protected $category;

    abstract public function getTitle();

    public function __construct($rooms, $category, $price, $type)
    {
        $this->rooms=$rooms;
        $this->type=$type;
        $this->price=$price;
        $this->category=$category;
    }

    public function getRooms()
    {
        return $this->type=="дом" ? $this->rooms."-комнатный " : $this->rooms."-комнатную ";
    }

    public function getType()
    {
        return $this->type;
    }

    public function getPrice()
    {
        return $this->price>1000000 ? ($this->price/1000000)." млн " : number_format($this->price, 0, '', ' '); 
    }

    public function getCategory()
    {
        return $this->category;
    }
}

interface Period
{
    public function getPeriod($period);
}

class AdvertRent extends Advert implements Period
{
    protected $period;

    public function getPeriod($period)
    {
        return $this->period=$period;
    }

    public function getTitle()
    {
        return " • ".$this->getCategory()." ".$this->getRooms().$this->getType()." за ".$this->getPrice()." тг в ";
    }
}

class AdvertSale extends Advert
{
    public function getTitle()
    {
        return " • ".$this->getCategory()." ".$this->getRooms().$this->getType()." за ".$this->getPrice()." тг";
    }
}

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
];

foreach($adverts as $v1){
    $v1['category'] = ($v1['category'] == "sale") ? "Продам" : "Сдам";
    $v1['type'] = ($v1['type'] == "dom") ? "дом" : "квартиру";
    
    if (array_key_exists('period', $v1)){
        $v1['period'] = ($v1['period'] == "month") ? "месяц" : "сутки";
        $objAdvertRent = new AdvertRent($v1['rooms'], $v1['category'], $v1['price'], $v1['type']);
        echo $objAdvertRent->getTitle().$objAdvertRent->getPeriod($v1['period'])."<br>\n";
    } else {
        $objAdvertSale = new AdvertSale($v1['rooms'], $v1['category'], $v1['price'], $v1['type']);
        echo $objAdvertSale->getTitle()."<br>\n";
    }
}