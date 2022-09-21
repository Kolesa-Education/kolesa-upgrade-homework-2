<?php

abstract class Advert
{
    protected $rooms;
    protected $category;
    protected $price;
    protected $type;
    protected $period;

    public function __construct($advert)
    {
        $this->rooms = $advert['rooms'];
        $this->category = $advert['category'];
        $this->price = $advert['price'];
        $this->type = $advert['type'];
        if (array_key_exists('period',$advert)){
            $this->period = $advert['period'];
        }
    }
    public function getRooms()
    {
        return strcmp('dom',$this->type)==0 ? $this->rooms.'-комнатный' : $this->rooms.'-комнатную';
    }
    public function getType(){
        return strcmp('kvartira',$this->type)!=0 ? 'дом' : 'квартиру';
    }
    public function getPrice()
    {
        return $this->price>9999999 ? ($this->price/1000000).' млн тг' : number_format($this->price,0,'',' ');
    }
}

?>