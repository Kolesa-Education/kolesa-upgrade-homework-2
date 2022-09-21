<?php

class SaleAdvert extends Advert {
    public function __construct(?int $rooms = null, ?string $category = 'sale', ?int $price = null, 
                                ?string $type = null) {
        $this->rooms = $rooms;
        $this->category = $category;
        $this->price = $price;
        $this->type = $type;
    }

    public function getTitle(): string {
        $outputPrice = $this->getPrice();
        $outputType = $this->getType();
        return "Продам " . $this->rooms . $outputType . " за " . $outputPrice . " тг" . "\n";
    }
}