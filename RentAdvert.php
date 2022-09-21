<?php
require_once "AdvertInterface.php";
class RentAdvert extends Advert implements AdvertInterface
{
    public $category = 'rent';
    private $period;

    function __construct(string $type, int $rooms, int $price, string $period) {
        parent::__construct($type, $rooms, $price);
        $this->period = $period;
    }

    public function getPeriod() {
        return $this->period;
    }
}
