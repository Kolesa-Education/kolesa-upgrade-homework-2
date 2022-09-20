<?php

class Advert {
    public $rooms;
    public $category;
    public $price;
    public $type;
    public $period;

    public function __construct(int $rooms, string $category, int $price, string $type, string $period) {
        $this->rooms = $rooms;
        $this->category = $category;
        $this->price = $price;
        $this->type = $type;
        $this->period = $period;
    }

    public function getTitle(): string {
        $this->type = $this->type == "kvartira" ? "квартиру":"дом";
        if($this->category == 'rent') {
            $this->period = $this->period == "month" ? "месяц":"сутки";
            $retValue = sprintf("Сдам %u-комнатную %s за %u тг в %s\n",$this->rooms, $this->type, $this->price, $this->period);
            return $retValue;
        } else {
            $retValue = sprintf("Продам %u-комнатный %s за %u тг\n",$this->rooms, $this->type, $this->price);
            return $retValue;
        }
    }
}

$adverts = [
['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'day'],
];

foreach ($adverts as $value) 
{

    if ($value['category'] == 'rent') {
        $advert = new Advert($value['rooms'], $value['category'], $value['price'], $value['type'], $value['period']);
        echo $advert->getTitle();
    } else {
        $advert = new Advert($value['rooms'], $value['category'], $value['price'], $value['type'], ' ');
        echo $advert->getTitle();
    }
}
?>