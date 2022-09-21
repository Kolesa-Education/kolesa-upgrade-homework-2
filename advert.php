<?php
class Advert{
    protected $rooms;
    protected $category;
    protected $price;
    protected $type;
    protected $period;
    protected $result;

    public function __construct($advert) {
        $this->rooms = $advert['rooms'];
        $this->category = $advert['category'];
        $this->price = $advert['price'];
        $this->type = $advert['type'];
        if (isset($advert['period'])) {
            $this->period = $advert['period'];
        }
    }
    public function getTitle(){
        $price2 = (string) $this->price;
        if ($this->price > 1000000) {
            $price2 = (string) $this->price / 1000000 . ' млн.';
        }
        $result = "";
        if ($this->category == "rent") {
            $result .= "Сдам ";
        } else {
            $result .= "Продам ";
        }
        if ($this->type == "kvartira"){
            $result .= $this->rooms . "-комнатную квартиру за " . $price2 . " тг";
        }
        else {
            $result .= $this->rooms . "-комнатный дом за " . $price2 . " тг";
        }
        if ($this->period == "month") {
            $result .= " в месяц";
        }
        else if ($this->period == "day") {
            $result .= " в день";
        }
        return $result;
    }
}