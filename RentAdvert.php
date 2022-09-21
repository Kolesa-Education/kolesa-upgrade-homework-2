<?php

class RentAdvert extends Advert {
    protected ?string $period;
    
    public function __construct(?int $rooms = null, string $category = 'rent', ?int $price = null, 
                                ?string $type = null, ?string $period = null) {
        $this->rooms = $rooms;
        $this->category = $category;
        $this->price = $price;
        $this->type = $type;
        $this->period = $period;
    }

    public function getTitle(): string {
        $outputPrice = $this->getPrice();
        $outputType = $this->getType();
        $output = "Сдам " . $this->rooms . $outputType . " за " . $outputPrice . " тг";
        if (!is_null($this->period)) {
            $outputPeriod = ($this->period == "month") ? "месяц" : "сутки";
            return $output . " в " . $outputPeriod . "\n";
        } else {
            return $output . "\n";
        }
    }
}