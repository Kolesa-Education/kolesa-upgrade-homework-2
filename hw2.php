<?php

interface printable
{
    public static function getPrintableString(string $estateType);
}

class RealEstateTypes implements printable
{

    private static $instances = [];

    protected function __construct()
    {
    }

    protected function __clone()
    {
    }

    public function __wakeup()
    {
    }

    public static function getInstance(): RealEstateTypes
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }

    const REAL_ESTATE_TYPES = array(
        'dom' => '-комнатный дом',
        'kvartira' => '-комнатную квартиру',
    );

    public static function checkEstateType(string $estateType): bool
    {
        if (!array_key_exists($estateType, self::REAL_ESTATE_TYPES))
            throw new Exception('ESTATE TYPE: ' . $estateType . "DOESN'T EXIST");
        return true;
    }

    public static function getPrintableString(string $estateType): string
    {
        try {
            self::checkEstateType($estateType);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return self::REAL_ESTATE_TYPES[$estateType];
    }
}


class RealEstate
{

    protected string $estateType;
    protected int $numberOfRooms;

    public function __construct(string $estateType, int $numberOfRooms)
    {

        $this->setEstateType($estateType);
        $this->setNumberOfRooms($numberOfRooms);

    }

    private function setEstateType(string $estateType): void
    {
        try {
            RealEstateTypes::checkEstateType($estateType);
        } catch (Exception $e) {
            echo e->getMessage();
        }
        $this->estateType = $estateType;
    }

    private function setNumberOfRooms(int $numberOfRooms): void
    {
        try {
            $this->checkIsPosInt($numberOfRooms);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $this->numberOfRooms = $numberOfRooms;
    }

    protected function checkIsPosInt(int $number): bool
    {
        if (!(is_int($number) and $number > 0))
            throw new Exception('NUMBER: ' . $number . " IS NOT POSITIVE OR INTEGER");
        return true;
    }

    public function getPrintableRealEstate(): string
    {
        return $this->numberOfRooms . RealEstateTypes::getPrintableString($this->estateType);
    }

}

class Advert extends RealEstate
{

    const CATEGORIES = array(
        'sale' => 'Продам',
        'rent' => 'Сдам',
    );

    const PERIODS = array(
        '' => '',
        'month' => 'в месяц',
        'day' => 'в сутки',
        'hour' => 'за час',
    );

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
        if ($this->category == 'rent')
            $this->setPeriod($period);
        else $this->period = '';
    }

    public function getTitle(): string
    {
        return implode(' ', array(self::CATEGORIES[$this->category],
            $this->getPrintableRealEstate(),
            $this->getPrintablePrice(),
            self::PERIODS[$this->period]
        ));
    }

    private function getPrintablePrice(): string
    {
        if ($this->price >= 1_000_000_000)
            return round($this->price / 1_000_000_000, 2) . ' млрд. тг';
        elseif ($this->price >= 1_000_000)
            return round($this->price / 1_000_000, 2) . ' млн. тг';
        else
            return number_format($this->price, 0, '.', ' ') . ' тг';
    }

    private static function checkCategory(string $category): bool
    {
        if (!array_key_exists($category, self::CATEGORIES))
            throw new Exception('CATEGORY: ' . $category . "DOESN'T EXIST");
        return true;
    }

    private static function checkPeriod(string $period): bool
    {
        if (!array_key_exists($period, self::PERIODS) || $period == '')
            throw new Exception('PERIOD: ' . $period . "DOESN'T EXIST");
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
        $this->price = $price;;
    }
}

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
];


$objectAdverts = array();

foreach ($adverts as $advert) {
    $period = array_key_exists('period', $advert) ? $advert['period'] : '';
    array_push($objectAdverts, new Advert(
        category: $advert['category'],
        price: $advert['price'],
        estateType: $advert['type'],
        numberOfRooms: $advert['rooms'],
        period: $period
    ));
}

foreach ($objectAdverts as $advert) {
    echo $advert->getTitle() . PHP_EOL;
}