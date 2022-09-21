<?php

class Rent extends Advert implements Title

{
    public $rooms;
    public $type;
    public $period;

    public function __construct(int $rooms, string $category, int $price,string $type, $period=null)
    {
        $this->rooms = $rooms;
        $this->type = $type;
        $this->period = $period;
        $this->category = $category;
        $this->price = $price;
        parent:: __construct($category, $price);
    }

    public function getTitle()
    {
        $result = "";
        $result=$result."Сдам " ;


        if ($this->rooms >= 1 && $this->rooms < 5) {
            $result = $result . $this->rooms . "-комнатную";
        } else {
            $result = $result . $this->rooms . "-комнатный";
        }

        if ($this->type === "kvartira") {
            $result = $result . " квартиру ";
        } else {
            $result = $result . " дом ";
        }


        if ($this->price > 1000000 && $this->price < 999000000) {
            $tempPrice = $this->price / 1000000;
            $result = $result . "за " . $tempPrice . " млн. тг";

        } else {

            $result = $result . "за " . $this->price . " тг ";
        }

        if ($this->period != "") {
            if ($this->period === "month") {
                $result = $result . "в месяц";
            } else {
                $result = $result . "в сутки";
            }
        }
       //print_r($result . "\n");
        print_r($result . '<br/>');
    }




}