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

    private function get_category()
    {
        if ($this->category == "sale") {
            return "Продам";
        } elseif ($this->category == "rent") {
            return "Сдам";
        }
    }

    private function get_type()
    {
        if ($this->type == "dom") {
            return "дом";
        } elseif ($this->type == "kvartira") {
            return "квартиру";
        }
    }

    private function get_ends()
    {
        if ($this->type == "dom") {
            return "ый";
        } elseif ($this->type == "kvartira") {
            return "ую";
        }
    }

    private function parse_price(int $size)
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

    public function getTitle()
    {
        return $this->get_category() . " " . $this->rooms . "-комнатн" . $this->get_ends() . " " . $this->get_type()  . " " . "за"  . " " . $this->parse_price($this->price) . " " . "тг" . "\n";
    }
}

for ($i = 0; $i < count($adverts); $i++) {
    $new_arr = $adverts[$i];
    $values = array_values($new_arr);
    $a = new Advert($values[0], $values[1], $values[2], $values[3]);
    echo $a->getTitle();
}
