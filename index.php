<?php
class advertActionClass extends advertClass
{

    public function __construct($rooms, $category, $price, $type, $period = null)
    {
        parent::__construct($rooms, $category, $price, $type);
        $this->setPeriod($period);
    }

    /**
     * @param mixed|null $period
     */
    public function setPeriod($period)
    {
        if ($period == "month") {
            $this->period = 'в месяц';
        } elseif ($period == "day") {
            $this->period = 'в месяц';
        } else {
            $this->period = null;
        }
    }

    /**
     * @return mixed|null
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        if (!isset($this->period)) {
            return "$this->category $this->rooms$this->type $this->price" . PHP_EOL;
        } else {
            return "$this->category $this->rooms$this->type $this->price $this->period" . PHP_EOL;
        }
    }
}

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
];

foreach ($adverts as $advert) {
    if (!isset($advert['period'])) {
        $action = new advertActionClass($advert['rooms'], $advert['category'], $advert['price'], $advert['type']);
    } else {
        $action = new advertActionClass($advert['rooms'], $advert['category'], $advert['price'], $advert['type'], $advert['period']);
    }
    echo $action->getTitle();
}