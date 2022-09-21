<?php

include("RealEstate.php");

class Advert extends RealEstate
{

    const CATEGORIES = [
        'sale' => 'Продам',
        'rent' => 'Сдам',
    ];

    const PERIODS = [
        '' => '',
        'month' => 'в месяц',
        'day' => 'в сутки',
        'hour' => 'за час',
    ];

    protected int $price;
    protected string $category;
    protected string $period;


    public function __construct(string $category,
                                int    $price,
                                string $estateType,
                                int    $numberOfRooms,
                                string $period = '')
    {
        parent::__construct($estateType, $numberOfRooms);
        $this->setCategory($category);
        $this->setPrice($price);
        if ($this->category == 'rent') {
            $this->setPeriod($period);
        } else {
            $this->period = '';
        }
    }

    public function getTitle(): string
    {
        return implode(' ', [
            self::CATEGORIES[$this->category],
            $this->getPrintableRealEstate(),
            $this->getPrintablePrice(),
            self::PERIODS[$this->period]
        ]);
    }

    private function getPrintablePrice(): string
    {
        if ($this->price >= 1_000_000_000) {
            return round($this->price / 1_000_000_000, 2) . ' млрд. тг';
        } elseif ($this->price >= 1_000_000) {
            return round($this->price / 1_000_000, 2) . ' млн. тг';
        }
        return number_format($this->price, 0, '.', ' ') . ' тг';
    }

    private static function checkCategory(string $category): bool
    {
        if (!array_key_exists($category, self::CATEGORIES)) {
            throw new Exception('CATEGORY: ' . $category . "DOESN'T EXIST");
        }
        return true;
    }

    private static function checkPeriod(string $period): bool
    {
        if (!array_key_exists($period, self::PERIODS) || $period == '') {
            throw new Exception('PERIOD: ' . $period . "DOESN'T EXIST");
        }
        return true;
    }

    private function setCategory(string $category): void
    {
        try {
            $this->checkCategory($category);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $this->category = $category;
    }

    private function setPeriod(string $period): void
    {
        try {
            $this->checkPeriod($period);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $this->period = $period;
    }

    private function setPrice(int $price): void
    {
        try {
            $this->checkIsPosInt($price);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $this->price = $price;
    }
}
