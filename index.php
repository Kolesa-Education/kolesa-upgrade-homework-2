<?php

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
];

// Advert class
abstract class Advert
{
    protected $rooms;
    protected $category;
    protected $price;
    protected $type;
    protected $period;

    function set_rooms($rooms) {
        $this->rooms = $rooms;
    }
    function set_category($category) {
        $this->category = $category;
    }
    function set_price($price) {
        $this->price = $price;
    }
    function set_type($type) {
        $this->type = $type;
    }
    function set_period($period) {
        $this->period = $period;
    }

    function get_rooms() {
        return $this->rooms;
    }
    function get_category() {
        return $this->category;
    }
    function get_price() {
        return $this->price;
    }
    function get_type() {
        return $this->type;
    }
    function get_period() {
        return $this->period;
    }
}

// creating title
class create_title extends Advert {
    function __construct($rooms, $category, $price, $type, $period) {
        $this->rooms = $rooms;
        $this->category  = $category;
        $this->price = $price;
        $this->type = $type;
        $this->period = $period;
    }

    function getTitle() {
        if ($this->type == "dom") {
            $type_text = "-комнатный дом за ";
        } else {
            $type_text = "-комнатную квартиру за ";
        }

        if ($this->period == "month") {
            $period_text = " тг в месяц";
        } else {
            $period_text = " тг в сутки";
        }

        if($this->price >= 1000000) {
            $new_price = $this->price / 1000000;

            if (ctype_digit($new_price)) {
                $formatted_price = number_format($new_price, 0, '.', ' ');
            } else {
                $formatted_price = number_format($new_price, 1, '.', ' ');
            }

        } else {
            $formatted_price = number_format($this->price, 0, '.', ' ');
        }

        if ($this->category == "sale") {
            $text = "Продам " . $this->rooms . $type_text . $formatted_price . " млн. тг<br>";
        } else {
            $text = "Сдам " . $this->rooms . $type_text . $formatted_price . $period_text ."<br>";
        }

        return $text;
    }
}

// insert and print titles
for ($i = 0; $i < count($adverts); $i++) {

    $title = new create_title($adverts[$i]['rooms'], $adverts[$i]['category'], $adverts[$i]['price'], $adverts[$i]['type'], $adverts[$i]['period']);
    echo $title->getTitle();
}