<?php

require_once ("AdvertInterface.php");


abstract class Advert implements AdvertInterface
{
    public int $rooms;
    public string $category;
    public int $price;
    public string $period = '';

    public function __construct(array $advert)
    {
        $this->rooms = $advert['rooms'];
        $this->category = $advert['category'];
        $this->price = $advert['price'];
        if (isset($advert['period'])) {
            $this->period = $advert['period'];
        }
    }

    public function getCategory(): string
    {
        if ($this->category === 'sale') {
            return 'Продам ';
        } else {
            return 'Сдам ';
        }
    }

    public function getPrice(): string
    {
        if ($this->price < 1000) {
            return sprintf($this->price) . ' тг';
        }

        if ($this->price < 1000000) {
            $price = $this->price / 1000;
            return number_format($price, 3, " ") . ' тыс.тг';
        }

        if ($this->price < 1000000000) {
            $price = $this->price / 1000000;
            return number_format($price, 1) . ' млн.тг';
        }

        $price = $this->price / 1000000000;

        return number_format($price) . ' млрд.тг';
    }

    

    public function rentPeriod(): string
    {
        if ($this->period === 'month') {
            return ' в месяц';
        } else if ($this->period === 'day') {
            return ' в сутки';
        } else if ($this->period === 'week') {
            return ' в неделю';
        } else if ($this->period === 'year') {
            return ' в год';
        } else {
            return '';
        }
    }
    abstract public function getType();
    
        
        
    

    public function getTitle(): void
    {
        
        $category = $this->getCategory();
        $price = $this->getPrice();
        $type = $this->getType();
        $period = $this->rentPeriod();

        echo "• $category $this->rooms  $type  $price  $period <br>";
        
    }

    
}


