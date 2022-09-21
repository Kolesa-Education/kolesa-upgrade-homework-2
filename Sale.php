<?php
include_once 'title.php';
include_once 'advert.php';

class Sale extends Advert implements Title
{
    public function getTitle()
    {
        return 'Продам '.$this->getRooms().' '.$this->getType().' за '.$this->getPrice()."\n";
    }
}