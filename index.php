<?php

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'day'],
];

abstract class GlobalAdvert
{
    public string $type;
    public int $rooms;
    public int $price;
    public string $category;

    public function __construct(string $type,int $rooms,int $price,string $category)
    {
        $this->type = $type;
        $this->rooms = $rooms;
        $this->price = $price;
        $this->category = $category;
    }

    abstract function getTitle();
}

class Rent extends GlobalAdvert
{
    public string $period;

    public function __construct(string $type,int $rooms,int $price,string $category,string $period)
    {
        $this->period = $period;
        parent::__construct($type,$rooms,$price,$category,$period);
    }

    public function getTitle(){
        if ($this->type=='dom') {
            return "Сдам " . $this->rooms . "-комнатный дом за " . $this->price . " тг в " . $this->translatePeriod($this->period) . "\n";
        } else {
            return "Сдам " . $this->rooms . "-комнатную квартиру за " . $this->price . " тг в " . $this->translatePeriod($this->period) . "\n";
        }
    }

    private function translatePeriod($period): string
    {
        if ($period === "month"){
            return "месяц";
        }else if ($period === "day"){
            return "день";
        }
    }
}

class Sale extends GlobalAdvert
{
    public function getTitle(){
        if ($this->type=='dom') {
            return  "Продам " . $this->rooms . "-комнатный дом за " . $this->roundPrice($this->price) . " млн.тг\n"; 
        } else {
            return  "Продам " . $this->rooms . "-комнатную квартиру за " . $this->roundPrice($this->price) . " млн.тг\n"; 
        }
    }

    private function roundPrice($price): int
    {
        if ($price>=1000000){
            return $price/1000000;
        }else{
            return $price;
        }
    }
}

foreach ($adverts as $advert){
    if ($advert['category'] === "rent"){
        $advertObject = new Rent($advert['type'],$advert['rooms'],$advert['price'],$advert['category'],$advert['period']);
        echo $advertObject->getTitle();
    }else if ($advert['category'] === "sale"){
        $advertObject = new Sale($advert['type'],$advert['rooms'],$advert['price'],$advert['category']);
        echo $advertObject->getTitle();
    }
}