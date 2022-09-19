<?php 

abstract class Advert {
    private int $rooms;
    private int $price;
    private string $type;
    private string $period;

    public function getTitle(): string { }

    public function changePrice(int $price): void { } 
}

class SaleAdvert extends Advert {
    private string $category;

    public function __construct(int $rooms = 0, string $category = 'sale', int $price = 0, 
                                string $type = 'none', string $period = 'none') {
        $this->rooms = $rooms;
        $this->category = $category;
        $this->price = $price;
        $this->type = $type;
        $this->period = $period;
    }

    public function getTitle(): string {
        if ($this->period == 'none') {
            return "Selling " . $this->rooms . "-room " . $this->type . " for " . $this->price . " tenges.\n";
        }
        return "Selling " . $this->rooms . "-room " . $this->type . " for " . $this->price . " tenges per " . $this->period . "\n";
    }

    public function changePrice(int $price): void {
        $this->price = $price;
    } 
}

class RentAdvert extends Advert {
    private string $category;

    public function __construct(int $rooms = 0, string $category = 'rent', int $price = 0, 
                                string $type = 'none', string $period = 'none') {
        $this->rooms = $rooms;
        $this->category = $category;
        $this->price = $price;
        $this->type = $type;
        $this->period = $period;
    }

    public function getTitle(): string {
        if ($this->period == 'none') {
            return "Renting " . $this->rooms . "-room " . $this->type . " for " . $this->price . " tenges.\n";
        }
        return "Renting " . $this->rooms . "-room " . $this->type . " for " . $this->price . " tenges per " . $this->period . "\n";
    }

    public function changePrice(int $price): void {
        $this->price = $price;
    }
}