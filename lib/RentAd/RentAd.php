<?php

class RentAd extends Advert {
    // Child class inherited base abstract class
    // Sets the category, extends constructor and implement new method
    protected $period;

    public function __construct(string $type, int $rooms, int $price, string $period) {
        parent::__construct($type, $rooms, $price);
        $this->category = 'rent';
        $this->period = $period;
    }

    public function getCategory(): string {
        return $this->category;
    }

    public function getPeriod(): string {
        return $this->period;
    }
}
