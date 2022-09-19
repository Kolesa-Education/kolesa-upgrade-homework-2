<?php

abstract class AdvertClass
{
    protected $rooms;
    protected $category;
    protected $price;
    protected $type;
    protected $period;

    protected function price()
    {
        $price_size = log10($this->price);
        if ($price_size >= 6 && $this->price % 10 ** 5 == 0) {
            $advert_price = ($this->price / 10 ** 6) . " млн. тг";
        } elseif ($price_size >= 3 && $price_size <= 6 && $this->price % 10 ** 2 == 0) {
            $advert_price = (string) ($this->price / 10 ** 3) . " тыс. тг";
        } else {
            $advert_price = (string) ((int) $this->price) . " тг";
        }
        return $advert_price;
    }

    protected function type()
    {
        if ($this->type == "dom") {
            $advert_type = "комнатный дом";
        } elseif ($this->type == "kvartira") {
            $advert_type = "комнатную квартиру";
        } else {
            $advert_type = $this->type;
        }
        return $advert_type;
    }

    protected function period()
    {
        if ($this->period == "month") {
            $advert_period = "в месяц";
        } elseif ($this->period == "day") {
            $advert_period = "в сутки";
        } else {
            $advert_period = $this->period;
        }
        return $advert_period;
    }

    abstract public function get_title(): string;
}
class SaleAdvertClass extends AdvertClass
{
    public function __construct(int $rooms = NULL, float $price = NULL, string $type = NULL)
    {
        $this->rooms = $rooms;
        $this->price = $price;
        $this->type = $type;
    }

    public function get_title(): string
    {
        $advert_price = $this->price();
        $advert_type = $this->type();

        return "Продам $this->rooms-$advert_type за $advert_price" . "<br>";
    }
}

class RentAdvertClass extends AdvertClass
{
    public function __construct(int $rooms = NULL, float $price = NULL, string $type = NULL, string $period = NULL)
    {
        $this->rooms = $rooms;
        $this->price = $price;
        $this->type = $type;
        $this->period = $period;
    }

    public function get_title(): string
    {

        $advert_price = $this->price();
        $advert_period = $this->period();
        $advert_type = $this->type();

        return "Сдам $this->rooms-$advert_type за $advert_price $advert_period" . "<br>";
    }
}