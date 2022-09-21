<?php
include_once 'title.php';
include_once 'advert.php';

class Rent extends Advert implements Title
{
    public function getPeriod()
    {
        if ($this->period == "month") {
            return "месяц";
        } else if ($this->period == "day") {
            return " сутки";
        } else if ($this->period == null) {
            return "";
        }
    }
    public function getTitle()
    {
        return "Сдам"." ".$this->getRooms()." ".$this->getType()." за ".$this->getPrice().' тг в '.$this->getPeriod()."\n";
    }
}