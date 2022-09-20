<?php

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
];

/**
 * abstract class Advert
 */
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

/**
 * class for formatting price
 */
class Format extends Advert {

    function price_format($price) {
        if($price >= 1000000) {
            $new_price = $price / 1000000;

            if (ctype_digit($new_price)) {
                $formatted_price = number_format($new_price, 0, '.', ' ');
            } else {
                $formatted_price = number_format($new_price, 1, '.', ' ');
            }

        } else {
            $formatted_price = number_format($price, 0, '.', ' ');
        }
        return $formatted_price;
    }
}

/**
 * RentAdvert class for realize rent title
 */
class RentAdvert extends Advert {

    const TYPE = "dom";
    const PERIOD = "month";

    function __construct($rooms, $category, $price, $type, $period) {
        $this->set_rooms($rooms);
        $this->set_category($category);
        $this->set_price($price);
        $this->set_type($type);
        $this->set_period($period);
    }

    function isTypeDom() {
        return self::TYPE == $this->get_type();
    }

    function isPeriodMonth() {
        return self::PERIOD == $this->get_period();
    }

    function getTitle() {

        if ($this->isTypeDom()) {
            $type_text = "-комнатный дом за ";
        } else {
            $type_text = "-комнатную квартиру за ";
        }

        if ($this->isPeriodMonth()) {
            $period_text = " тг в месяц";
        } else {
            $period_text = " тг в сутки";
        }

        $formatted_price = new Format;

        return "Сдам " . $this->get_rooms() . $type_text . $formatted_price->price_format($this->price) . $period_text ."<br>";
    }
}

/**
 * SaleAdvert class for realize sale title
 */
class SaleAdvert extends Advert {

    const TYPE = "dom";
    const PERIOD = "month";

    function __construct($rooms, $category, $price, $type) {
        $this->set_rooms($rooms);
        $this->set_category($category);
        $this->set_price($price);
        $this->set_type($type);
    }

    function isTypeDom() {
        return self::TYPE == $this->get_type();
    }

    function getTitle() {

        if ($this->isTypeDom()) {
            $type_text = "-комнатный дом за ";
        } else {
            $type_text = "-комнатную квартиру за ";
        }

        $formatted_price = new Format;
        return "Продам " . $this->get_rooms() . $type_text . $formatted_price->price_format($this->price) . " млн. тг<br>";
    }
}

/**
 * insert data and print titles
 */
foreach ($adverts as $ad) {
    if ($ad['category'] == 'sale') {
        $title = new SaleAdvert($ad['rooms'], $ad['category'], $ad['price'], $ad['type']);
        echo $title->getTitle();
    } else {
        $title = new RentAdvert($ad['rooms'], $ad['category'], $ad['price'], $ad['type'], $ad['period']);
        echo $title->getTitle();
    }
}