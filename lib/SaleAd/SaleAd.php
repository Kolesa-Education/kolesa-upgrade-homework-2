<?php

class SaleAd extends Advert {
    // Child class inherited base abstract class and set the category
    public function __construct(string $type, int $rooms, int $price) {
        parent::__construct($type, $rooms, $price);
        $this->category = 'sale';
    }

    public function getCategory(): string {
        return $this->category;
    }
}
