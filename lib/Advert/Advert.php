<?php

abstract class Advert implements Ad, RealEstate {
    // Abstract base class with interface methods implementation
    protected $type;
    protected $rooms = 1;
    protected $price;

    function __construct(string $type, int $rooms, int $price) {
        $this->type = $type;
        $this->rooms = $rooms;
        $this->price = $price;
    }
    
    public function getCategory(): string {
        return $this->category;
    }

    public function getAdType(): string {
        return $this->type;
    }

    public function getPrice(): int {
        return $this->price;
    }

    public function getRooms(): int {
        return $this->rooms;
    }
}
