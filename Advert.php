<?php

class Advert
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

    protected function convert_price($price)
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

    protected function convert_period($period)
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

    public function get_sale_house()
    {
        return "Продам {$this->rooms}-комнатный дом за {$this->convert_price($this->price)}";
    }

    public function get_sale_flat()
    {
        return "Продам {$this->rooms}-комнатную квартиру за {$this->convert_price($this->price)}";
    }

    public function get_rent_house()
    {
        return "Сдам {$this->rooms}-комнатный дом за {$this->convert_price($this->price)} в {$this->convert_period($this->period)}";
    }

    public function get_rent_flat()
    {
        return "Сдам {$this->rooms}-комнатную квартиру за {$this->convert_price($this->price)} в {$this->convert_period($this->period)}";
    }

    public function show_sale_house()
    {
        echo $this->get_sale_house() . "<br>";
    }

    public function show_sale_flat()
    {
        echo $this->get_sale_flat() . "<br>";
    }

    public function show_rent_house()
    {
        echo $this->get_rent_house() . "<br>";
    }

    public function show_rent_flat()
    {
        echo $this->get_rent_flat() . "<br>";
    }

    public function get_title()
    {
        if ($this->category === 'sale' && $this->type === 'dom') {
            return $this->get_sale_house();
        } else if ($this->category === 'sale' && $this->type === 'kvartira') {
            return $this->get_sale_flat();
        } else if ($this->category === 'rent' && $this->type === 'dom') {
            return $this->get_rent_house();
        } else if ($this->category === 'rent' && $this->type === 'kvartira') {
            return $this->get_rent_flat();
        }
    }

    public function show_title()
    {
        if ($this->category === 'sale' && $this->type === 'dom') {
            $this->show_sale_house();
        } else if ($this->category === 'sale' && $this->type === 'kvartira') {
            $this->show_sale_flat();
        } else if ($this->category === 'rent' && $this->type === 'dom') {
            $this->show_rent_house();
        } else if ($this->category === 'rent' && $this->type === 'kvartira') {
            $this->show_rent_flat();
        }
    }
}
