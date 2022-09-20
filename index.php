<?php

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'day'],
];

if (count($adverts) == 0) {
    exit;
}

class Advert
{
    protected $adv;

    public function __construct(array $adv)
    {
        $this->adv = $adv;
    }

    protected function type(string $type) : string
    {
        if ($type == 'dom') {
            return '-комнатный дом за';
        } else {
            return '-комнатную квартиру за';
        }
    }

    protected function sum(int $price) : string
    {
        if ($price < 1000000) {
            $n = number_format(floatval($price),0,'.',' ');
            return sprintf("%d тг", $n);
        } else {
            return sprintf("%d млн. тг", $price / 1000000);
        }
    }
}

class AdvertSale  extends Advert
{
    public function getTitle() : string
    {
        $cur = $this->adv;
        return 'Продам' . $cur[0] . $this->type($cur[3]) . $this->sum($cur[2]);
    }
}

class AdvertRent  extends Advert
{
    public function getTitle() : string
    {
        $cur = $this->adv;
        return 'Продам' . $cur[0] . $this->type($cur[3]) . $this->sum($cur[2]) . $this->period($cur[4]);;
    }

    protected function period(string $type) : string
    {
        if ($type == 'month') {
            return ' в месяц';
        } else {
            return ' в сутки';
        }
    }
}

$allAdv = array();

// adding
for ($i = 0; $i < count($adverts); $i++) {
    if ($adverts[$i]['category'] == 'sale') {
        array_push($allAdv,new AdvertSale($adverts[$i]));
    } else {
        array_push($allAdv,new AdvertRent($adverts[$i]));
    }
    
}

for ($i = 0; $i < count($allAdv); $i++) {
    echo $allAdv[$i]->getTitle();
}

?>