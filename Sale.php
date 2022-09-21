<?php


class Sale extends Advert implements Title

{
    public $rooms;
    public $type;


    public function __construct(int $rooms, string $category, int $price,string $type)
    {
        $this->rooms = $rooms;
        $this->category = $category;
        $this->price = $price;
        $this->type = $type;

        parent:: __construct($category,$price);
    }

    public function getTitle()
    {
        $result="";
        $result=$result."Продам " ;


        if ($this->rooms >= 1 && $this->rooms < 5){
            $result=$result.$this->rooms."-комнатную";
        } else {
            $result=$result.$this->rooms."-комнатный";
        }

        if ($this->type === "kvartira") {
            $result=$result." квартиру " ;
        } else {
            $result=$result." дом " ;
        }



        if ($this->price > 1000000 && $this->price < 999000000) {
            $tempPrice=$this->price/1000000;
            $result=$result."за ". $tempPrice." млн. тг" ;

        } else {

            $result=$result."за ". $this->price." тг " ;
        }



        print_r($result . '<br/>');
       // echo $result;

    }



}
