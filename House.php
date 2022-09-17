<?php

interface hasTitle {
    public function getTitle();
}

class House implements hasTitle {
    protected int $rooms = 0;
    protected string $category = "unknown";
    protected int $price = 0;
    protected string $type = "unknown";
    protected string $period = "";

    public function __construct($rooms, $category, $price, $type, $period) {
        $this->rooms = $rooms;
        $this->category = $category;
        $this->price = $price;
        $this->type = $type;
        $this->period = $period;
    }

    /**
     * @throws Exception
     */
    public function getTitle() : string {
        $title = "";

        if ($this->category == "sale") {
            $title .= "Продам ";
        } else if ($this->category == "rent") {
            $title .= "Сдам ";
        } else {
            throw new Exception("Unknown category");
        }

        $title .= "$this->rooms-";

        if ($this->rooms <= 2) {
            $title .= "комнатную ";
        } else {
            $title .= "комнатный ";
        }

        if ($this->type == "dom") {
            $title .= "дом ";
        } else if ($this->type == "kvartira") {
            $title .= "квартиру ";
        } else {
            throw new Exception("Unknown type");
        }

        $title .= "за " . $this->formatPrice($this->price);

        if ($this->period == "day") {
            $title .= " в сутки";
        } else if ($this->period == "month") {
            $title .= " в месяц";
        }

        return $title;
    }

    private function formatPrice(int $price) : string {
        if ($price > 1_000_000) {
            return round($price / 1_000_000, 2) . " млн. тг";
        } else {
            return number_format($price, 0, ".", " ") . " тг";
        }
    }
}

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'day'],
];

foreach ($adverts as $advert) {
    $house = new House($advert['rooms'], $advert['category'], $advert['price'], $advert['type'], $advert['period'] ?? "");
    echo $house->getTitle() . "<br>";
}
