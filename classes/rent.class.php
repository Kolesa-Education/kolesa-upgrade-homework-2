<?php
require_once 'classes/advert.class.php';

class Rent extends Advert implements Title
{

    public function getPeriod()
    {
        if ($this->period == "month") {
            return " в месяц";
        } else if ($this->period == "day") {
            return " в сутки";
        } else if ($this->period == null) {
            return "";
        }
    }

    public function getTitle()
    {
        $type = $this->getType();
        $price = $this->getPrice();
        $period = $this->getPeriod();

        return "Cдам " . $type . $price . $period . "<br>";
    }
}
