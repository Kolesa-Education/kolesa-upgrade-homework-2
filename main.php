<?php
class Advert{
    protected $rooms;
    protected $category;
    protected $price;
    protected $type;
    protected $period;
    protected $result;

    public function __consrtuct($rooms, $category, $price, $type, $period) {
        $this->rooms = $rooms;
        $this->category = $category;
        $this->price = $price;
        $this->type = $type;
        $this->period = $period;
    }

    public function getTitle(){
        /*
        if ($price > 1000000) {
            $price2 = (string) $price / 1000000 . 'млн.';
        }
        */
        if ($this->type == "kvartira"){
            $result = "Продам " . $this->rooms . "-комнатную квартиру за " . $this->price . "тг";
        }
        else {
            $result = "Продам " . $this->rooms . "-комнатный дом за " . $this->price . "тг";
        }

        if ($this->period == "month") {
            $result += " в месяц";
        }
        else if ($this->period == "day") {
            $result += " в день";
        }
        echo $result;
    }
    
}

$advert3 = new Advert(2, "rent", 200000, "kvartira", "month");
$advert4 = new Advert(1, "rent", 15000, "kvartira", "day");


echo $advert4->getTitle();

?>