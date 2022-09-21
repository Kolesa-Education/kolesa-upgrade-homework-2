<?php

interface AdvertInterface
{
    public function convert_price($price);
    public function convert_period($period);
    public function show_title();
}


class Advert implements AdvertInterface
{
    protected $rooms;
    protected $category;
    protected $price;
    protected $type;
    protected $period = null;

    public function __construct($advert)
    {
        $this->rooms = $advert['rooms'];
        $this->category = $advert['category'];
        $this->price = $advert['price'];
        $this->type = $advert['type'];
        if (isset($advert['period'])) {
            $this->period = $advert['period'];
        }
    }

    public function convert_price($price)
    {
        if ($price >= 1000000) {
            $result = $price / 1000000 . " млн. тг";
            return $result;
        } elseif ($price >= 1000) {
            $result = $price . " тг";
            return $result;
        } else {
            $result = $price . " тг";
            return $result;
        }
    }

    public function convert_period($period)
    {
        switch ($period) {
            case ("month"):
                return "месяц";
                break;
            case ("week"):
                return "неделю";
                break;
            case ("day"):
                return "день";
                break;
        }
    }

    public function show_title()
    {
        if ($this->category === 'sale' && $this->type === 'dom') {
            echo "Продам {$this->rooms}-комнатный дом за {$this->convert_price($this->price)}<br>";
        } else if ($this->category === 'sale' && $this->type === 'kvartira') {
            echo "Продам {$this->rooms}-комнатную квартиру за {$this->convert_price($this->price)}<br>";
        } else if ($this->category === 'rent' && $this->type === 'dom') {
            echo "Сдам {$this->rooms}-комнатный дом за {$this->convert_price($this->price)} в {$this->convert_period($this->period)} <br>";
        } else if ($this->category === 'rent' && $this->type === 'kvartira') {
            echo "Сдам {$this->rooms}-комнатную квартиру за {$this->convert_price($this->price)} в {$this->convert_period($this->period)}<br>";
        }
    }
}
