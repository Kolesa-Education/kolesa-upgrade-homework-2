<?php

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'day'],
];

class Advert
{
    private int $rooms;
    private string $category;
    private float $price;
    private string $type;

    public function __construct(int $rooms, string $category, float $price, string $type)
    {
        $this->rooms = $rooms;
        $this->category = $category;
        $this->price = $price;
        $this->type = $type;
    }

    private function getCategory(): string
    {
        if ($this->category == "sale") {
            return "Продам";
        } elseif ($this->category == "rent") {
            return "Сдам";
        }
    }

    private function getType(): string
    {
        if ($this->type == "dom") {
            return "дом";
        } elseif ($this->type == "kvartira") {
            return "квартиру";
        }
    }

    private function getEnds(): string
    {
        if ($this->type == "dom") {
            return "ый";
        } elseif ($this->type == "kvartira") {
            return "ую";
        }
    }

    private function parsePrice(int $size): mixed
    {
        if ((strlen($this->price) > 6)) {
            $postfix = "млн";
            $i = 0;
            while ($size >= 1000) {
                $i++;
                $size = $size / 1000;
            }
            $size = round($size * 100) / 100;
            return $size . ' ' . $postfix;
        } else {
            return $this->price;
        }
    }

    public function getTitle(): mixed
    {
        return $this->getCategory() . " " . $this->rooms . "-комнатн" . $this->getEnds() . " " . $this->getType()  . " " . "за"  . " " . $this->parsePrice($this->price) . " " . "тг" . "\n";
    }
}

for ($i = 0; $i < count($adverts); $i++) {
    $new_arr = $adverts[$i];
    $values = array_values($new_arr);
    $a = new Advert($adverts[$i]["rooms"], $adverts[$i]["category"], $adverts[$i]["price"], $adverts[$i]["type"]);
    echo $a->getTitle();
}
