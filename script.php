<?php
interface GetAdvert
{
    public function GetTitle() : string;
}

class Advertisement
{
    private int $numberOfRooms;
    private string $category;
    private int $price;

    function __construct(int $numberOfRooms, string $category, int $price)
    {
        $this->numberOfRooms = $numberOfRooms;
        $this->category = $category;

    }
    public function getRooms() : int
    {
        return $this->numberOfRooms;
    }
    
    public function setRooms(int $numberOfRooms) : void
    {
        if ($numberOfRooms > 0) {
            $this->numberOfRooms = $numberOfRooms;
        }
    }

    public function getCategory() : string
    {
        return $this->category;
    }

    public function setCategory(string $category) : void
    {
        if ($category == "sale" || $category == "rent") {
            $this->category = $category;
        }
    }

    public function getPrice() : int
    {
        return $this->price;
    }

    public function setPrice(int $price) : void
    {
        if ($price < 0) {
            return;
        }
        $this->price = $price;
    }
}

class FlatAdvertisement extends Advertisement implements GetAdvert 
{
    private string $period = "";

    public function getPeriod() : string {
        return $this->period;
    }

    public function setPeriod(string $period) : void {
        if ($period == "day" || $period == "month") {
            $this->period = $period;
        }
    }

    public function getTitle() : string
    {
        $title = $this->category == "sale" ? "Продам " : "Сдам ";
        $title .= $this->numberOfRooms . '-комнатную квартиру за ';
        $priceOfFlat = $this->price >= 1000000 ? ($this->price / 1000000 . " млн. тг") : ($this->price . " тг");
        $title .= $priceOfFlat;
        if ($this->category == "rent") {
            $title .= $this->period == "day" ? " в день." : " в сутки.";
        }
        $title .= PHP_EOL;
        return $title;
    }
}

class HouseAdvertisement extends Advertisement implements GetAdvert
{
    public function getTitle() : string 
    {
        $title = $this->category == "sale" ? "Продам " : "Сдам ";
        $title .= $this->numberOfRooms . '-комнатный дом за ';
        $priceOfHouse = $this->price >= 1000000 ? ($this->price / 1000000 . " млн. тг") : ($this->price . " тг");
        $title .= $priceOfHouse;
        $title .= PHP_EOL;
        return $title;
    }
}

//Формальность чтоб adverts появлялся откуда-нибудь
$adverts = $_GET['adverts'];
foreach($adverts as $advert) {
    if ($advert['type'] == "dom") {
        $object = new HouseAdvertisement($advert['rooms'], $advert['category'], $advert['price']);
    } elseif($advert['type'] == "kvartira") {
        $object = new FlatAdvertisement($advert['rooms'], $advert['category'], $advert['price']);
        $object->setPeriod($advert['period']);
    }
    echo $object->getTitle();
}