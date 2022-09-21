<?php

class RentAdvert implements Advert {
    private string $category;

    public function __construct(?int $rooms = null, ?string $category = 'rent', ?int $price = null, 
                                ?string $type = null, ?string $period = null) {
        $this->rooms = $rooms;
        $this->category = $category;
        $this->price = $price;
        $this->type = $type;
        $this->period = $period;
    }

    public function getTitle(): string {
        $outputPrice = ($this->price > 1000000) ? ($this->price / 1000000 . " млн.") : ($this->price);
        $outputType = ($this->type == "dom") ? "-комнатный дом" : "-комнатную квартиру";
        $output = "Сдам " . $this->rooms . $outputType . " за " . $outputPrice . " тг";
        if (!is_null($this->period)) {
            $outputPeriod = ($this->period == "month") ? "месяц" : "сутки";
            return $output . " в " . $outputPeriod . "\n";
        } else {
            return $output . "\n";
        }
    }
}