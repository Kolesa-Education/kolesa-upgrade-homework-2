<?php

interface getTitle{
    public function getTitle(): string;
}

abstract class Advert
{
    protected $rooms;
    protected $category;
    protected $price;
    protected $type;
    protected $period;

    protected function getPrice()
    {
        $priceSize = log10($this->price);
        if ($priceSize >= 6 && $this->price % 10 ** 5 == 0) {
            $advertPrice = ($this->price / 10 ** 6) . " млн. тг";
        } elseif ($priceSize >= 3 && $priceSize <= 6 && $this->price % 10 ** 2 == 0) {
            $advertPrice = (string) ($this->price / 10 ** 3) . " тыс. тг";
        } else {
            $advertPrice = (string) ((int) $this->price) . " тг";
        }
        return $advertPrice;
    }

    protected function getType()
    {
        if ($this->type == "dom") {
            $advertType = "комнатный дом";
        } elseif ($this->type == "kvartira") {
            $advertType = "комнатную квартиру";
        } else {
            $advertType = $this->type;
        }
        return $advertType;
    }

    protected function getPeriod()
    {
        if ($this->period == "month") {
            $advertPeriod = "в месяц";
        } elseif ($this->period == "day") {
            $advertPeriod = "в сутки";
        } else {
            $advertPeriod = $this->period;
        }
        return $advertPeriod;
    }


}
class SaleAdvert extends Advert implements getTitle
{
    public function __construct(int $rooms = NULL, int $price = NULL, string $type = NULL)
    {
        $this->rooms = $rooms;
        $this->price = $price;
        $this->type = $type;
    }

    public function getTitle(): string
    {
        $advertPrice = $this->getPrice();
        $advertType = $this->getType();

        return "Продам $this->rooms-$advertType за $advertPrice" . "<br>";
    }
}

class RentAdvert extends Advert implements getTitle
{
    public function __construct(int $rooms = NULL, int $price = NULL, string $type = NULL, string $period = NULL)
    {
        $this->rooms = $rooms;
        $this->price = $price;
        $this->type = $type;
        $this->period = $period;
    }

    public function getTitle(): string
    {

        $advertPrice = $this->getPrice();
        $advertPeriod = $this->getPeriod();
        $advertType = $this->getType();

        return "Сдам $this->rooms-$advertType за $advertPrice $advertPeriod" . "<br>";
    }
}

$adverts = [
    ["rooms" => 5, "category" => "sale", "price" => '50000-', "type" => "dom"],
    ["rooms" => 1],
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 'q', 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
    ["category" => 1]
];

$wrong_advert = array();

foreach ($adverts as $key => $advert) {
    if (!isset($advert["category"]) || !isset($advert["rooms"]) || !is_numeric($advert["rooms"]) || !isset($advert["price"]) || !is_numeric($advert["price"]) || !isset($advert["type"])) {
        array_push($wrong_advert, $key+1);
    } elseif ($advert["category"] == "sale") {
        $advert = new SaleAdvert($advert["rooms"], $advert["price"], $advert["type"]);
        echo $advert->getTitle();
    } elseif ($advert["category"] == "rent") {
        $advert = new RentAdvert($advert["rooms"], $advert["price"], $advert["type"], $advert["period"]);
        echo $advert->getTitle();
    }
}

if(!empty($wrong_advert)){
    echo "Прошу поправить следующие обявление они не полные либо не корректные:" . implode(", ", $wrong_advert) . "<br>"; 
}

