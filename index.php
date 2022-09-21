<?php

abstract class Advert
{
    public $rooms;
    public $price;
    public $type;

    public function __constructor(int $rooms, int $price, string $type)
    {
        $this->rooms = $rooms;
        $this->price = $price;
        $this->type = $type;
    } 

    protected function getPrice()
    {
        if ($this->price < 1000) {
            return 'за '. $this->price. ' тг';
        }
        if ($this->price < 1000000) {
            return 'за '.number_format($this->price, 0, ".", "&thinsp;"). ' тг';
        }
        if ($this->price >= 1000000) {
            return 'за '. ($this->price/1000000). ' млн. тг';
        }
    }

    protected function getType()
    {
        $types = [
            'dom' => 'ый дом ', 'kvartira' => 'ую квартиру '
        ];
        return $types[$this->type];
    }

    abstract public function getTitle() : string;
}

class Sale extends Advert
{
    public function getTitle(): string
    {
        return 'Продам '.$this->rooms.'-комнатн'.$this->getType().$this->getPrice();
    }

}

class Rent extends Advert
{
    private $period;

    public function setPeriod($period)
    {
        if (!is_string($period)) {
            throw new \Exception('Период должен быть не числовым значением');
        }

        $this->period = $period;
    }

    public function getPeriod()
    {
        $renting_period = [
            'year' => ' в год', 'month' => ' в месяц', 'day' => ' в день'
        ];

        return $renting_period[$this->period];
    }

    public function getTitle(): string
    {
        return 'Сдам '.$this->rooms.'-комнатн'.$this->getType().$this->getPrice().$this->getPeriod();
    }
}

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
];

$newAdverts = [];

foreach ($adverts as $i => $advert) {
    if ($advert['category']==='sale') {
        $examp = new Sale;
        foreach ($adverts[$i] as $k => $v) {
            $examp->$k = $v;
        }
    }
    if ($advert['category']==='rent') {
        $examp = new Rent;
        foreach ($adverts[$i] as $k => $v) {
            if ($k=='period') {
                $examp->setPeriod($v);
                continue;
            }
            $examp->$k = $v;
        }
    }
    array_push($newAdverts, $examp);
}
for ($i=0; $i<count($newAdverts); $i++) {
    echo $newAdverts[$i]->getTitle();
    echo '<br>';
}

?>