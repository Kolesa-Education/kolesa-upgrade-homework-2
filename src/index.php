<?php

require_once 'Advert.php';

class Sale_advert extends Advert
{
    public function __construct(int $rooms = NULL, float $price = NULL, string $type = NULL)
    {
        $this->rooms = $rooms;
        $this->price = $price;
        $this->type = $type;
    }

    public function get_title(): string
    {
        $formatted_txt = 'Продам %d-%s за %s' . PHP_EOL . '<br>';

        return sprintf(
            $formatted_txt,
            $this->rooms,
            $this->get_house_type(),
            $this->get_formatted_price(),
        );
    }
}

class Rent_advert extends Advert
{
    public function __construct(int $rooms = NULL, float $price = NULL, string $type = NULL, string $period = NULL)
    {
        $this->rooms = $rooms;
        $this->price = $price;
        $this->type = $type;
        $this->period = $period;
    }

    public function get_title(): string
    {
        $formatted_txt = 'Сдам %d-%s за %s %s' . PHP_EOL . '<br>';

        return sprintf(
            $formatted_txt,
            $this->rooms,
            $this->get_house_type(),
            $this->get_formatted_price(),
            $this->get_rent_period(),
        );
    }
}

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'day'],
    ['category' => 1],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'UNK', 'period' => 'day'],
];

$wrong_advert_arr = array();

foreach ($adverts as $key => $advert) {
    if (!isset($advert['category']) || !isset($advert['rooms']) || !isset($advert['price']) || !isset($advert['type'])) {
        array_push($wrong_advert_arr, $key);
    } elseif ($advert['category'] == 'sale') {
        $advert = new Sale_advert($advert['rooms'], $advert['price'], $advert['type']);
        echo $advert->get_title();
    } elseif ($advert['category'] == 'rent') {
        $advert = new Rent_advert($advert['rooms'], $advert['price'], $advert['type'], $advert['period']);
        echo $advert->get_title();
    }
}

echo '>>> неправильно заданы объявления:' . PHP_EOL . '<br>';
foreach ($wrong_advert_arr as $errors) {
    echo $errors . PHP_EOL . '<br>';
}

// EOF
