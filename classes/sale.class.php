<?php
require_once 'classes/advert.class.php';

class Sale extends Advert implements Title
{

    public function getTitle()
    {
        $type = $this->getType();
        $price = $this->getPrice();

        return "Продам " . $type . $price . "<br>";
    }
}
