<?php

abstract class Advert
{
    protected $rooms;
    protected $type;
    protected $price;
    protected $category;

    abstract public function getTitle();
    public function __construct($rooms, $category, $price, $type)
    {
        $this->rooms=$rooms;
        $this->type=$type;
        $this->price=$price;
        $this->category=$category;
    }
    public function getRooms()
    {
        return $this->type=="дом" ? $this->rooms."-комнатный " : $this->rooms."-комнатную ";
    }

    public function getType()
    {
        return $this->type;
    }

    public function getPrice()
    {
        return $this->price>1000000 ? ($this->price/1000000)." млн " : number_format($this->price, 0, '', ' '); 
    }

    public function getCategory()
    {
        return $this->category;
    }
}
interface Period
{
    public function setPeriod($period);
    public function getPeriod();
}

class AdvertRent extends Advert implements Period
    {
        protected $period;
    
        public function setPeriod($period)
        {
            $this->period=$period;
        }
    
        public function getPeriod()
        {
            return $this->period;
        }
    
        public function getTitle()
        {
            return " • ".$this->getCategory()." ".$this->getRooms().$this->getType()." за ".$this->getPrice()." тг в ".$this->getPeriod();
        }
    }
    
    class AdvertSale extends Advert
    {
        public function getTitle()
        {
            return " • ".$this->getCategory()." ".$this->getRooms().$this->getType()." за ".$this->getPrice()." тг";
        }
    }