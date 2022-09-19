<?php

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'day'],
];

abstract class Advert 
{
    protected int $rooms;
    protected string $category;
    protected int $price;
    protected string $type;

    public function __construct($rooms, $category, $price, $type) {
        $this->rooms = $rooms;
        $this->category = $category;
        $this->price = $price;
        $this->type = $type;
    }

}

/**
 * так как оба класса имплементируют метод get_title(), 
 * он вынесен отдельно в интерфейс
 */
interface AdvertTitle
{
    public function get_title();
}

/**
 * Класс-наследник для арендного жилья
 */
class RentalProperty extends Advert implements AdvertTitle
{
    public string $period;

    public function __construct($rooms, $category, $price, $type, $period) {
        $this->period = $period;
        parent::__construct($rooms, $category, $price, $type, $period);
    }

    public function convert_period($period) {
        if ($period === 'day') {
            return ' в сутки';
        } elseif ($period === 'month') {
            return ' в месяц';
        }
        return $period;
    }

    public function get_title() {
        if ($this->type === 'dom') {
            return 'Сдам ' . $this->rooms . '-комнатный дом за ' . $this->price . ' тг в' . $this->convert_period($this->period) . PHP_EOL;
        } elseif ($this->type === 'kvartira') {
            return 'Сдам ' . $this->rooms . '-комнатную квартиру за ' . $this->price . ' тг в' . $this->convert_period($this->period) . PHP_EOL;
        }
    }
}

/**
 * Класс-наследник для жилья на продажу
 */
class PropertyForSale extends Advert implements AdvertTitle
{
    public function round_price($price) {
        if ($price < 1000000) {
            return $price . ' тг';
        } else {
            return $price/1000000 . ' млн. тг';
        }
    }

    public function get_title() {
        if ($this->type === 'dom') {
            return 'Продам ' . $this->rooms . '-комнатный дом за ' . $this->round_price($this->price) . PHP_EOL;
        } elseif ($this->type === 'kvartira') {
            return 'Продам ' . $this->rooms . '-комнатную квартиру за ' . $this->round_price($this->price) . PHP_EOL;
        }
    }
}

foreach ($adverts as $ad) {
    if (isset($ad['period'])) {
        $result = new RentalProperty($ad['rooms'], $ad['category'], $ad['price'], $ad['type'], $ad['period']);
    } else {
        $result = new PropertyForSale($ad['rooms'], $ad['category'], $ad['price'], $ad['type']);
    }
    echo $result->get_title();
}

// EOF
