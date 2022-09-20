<?php
require_once 'classes/title.class.php';

abstract class Advert
{
    public int $rooms;
    public string $category;
    public int $price;
    public string $type;
    public int $period;

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

    public function getType()
    {
        if ($this->type == "dom") {
            return $this->rooms . "-комнатный дом ";
        } else if ($this->type == "kvartira") {
            return $this->rooms . "-комнатную квартиру ";
        }
    }

    public function getPrice()
    {
        if ($this->price < 1000000) {
            return "за " . number_format($this->price, 0, "", " ") . " " . "тг";
        } else if ($this->price >= 1000000) {
            return "за " . $this->price / 1000000 . " млн. тг";
        }
    }
}
