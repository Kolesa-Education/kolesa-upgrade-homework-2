<?php

interface OutPut {

    public function getTitle();
    public function getType();
    public function getPrice();
    
}

abstract class Advert implements OutPut
{

    protected $type;
    protected $price;
    protected $rooms;

    public function __construct(array $arguments = array()) {

        if (!empty($arguments)) {

            foreach ($arguments as $property => $argument) {

                $this->{$property} = $argument;

            }

        }

    }

    public function getType(): string {

        switch ($this->type) {

            case 'dom':
                return $this->rooms . '-комнатный дом ';
            case 'kvartira':
                return $this->rooms . '-комнатную квартиру ';

        }

        return 'какое-то помещение ';

    }

    public function getPrice(): string {

        if ($this->price >= 1000000) {

            return 'за ' . ($this->price / 1000000) . ' млн тг';

        }

        if ($this->price >= 1000) {

            return 'за ' . ($this->price / 1000) . ' 000' . " тг";

        }

        return 'за ' . $this->price . ' тг';

    }


}

class Sale extends Advert
{

    public function getTitle(): string {

        return 'Продам ' . $this->getType() . $this->getPrice() . PHP_EOL;

    }

}

class Rent extends Advert
{

    public $period;

    public function getTitle(): string {

        return 'Сдам ' . $this->getType() . $this->getPrice() . $this->getPeriod() . PHP_EOL;

    }

    private function getPeriod(): string {

        switch ($this->period) {

            case 'month':
                return ' в месяц';
            case 'day':
                return ' в сутки';

        }

        return ' на непоределённый срок';

    }

}

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'day'],
];

$objAdverts = array();

foreach ($adverts as $value) {

    switch ($value['category']) {

        case 'sale':
            $obj = new Sale($value);
            break;
        case 'rent':
            $obj = new Rent($value);
            break;

    }

    $objAdverts[] = $obj;

}

foreach ($objAdverts as $obj) {

    echo $obj->getTitle();

}

//EOF