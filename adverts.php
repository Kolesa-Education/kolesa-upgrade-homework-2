<?php

// The Second app for learning OOP
// Made on Kolesa Backend Upgrade 2022


interface Ad {
    // Made interface for required methods implementing
    public function getCategory(): string;
    public function getAdType(): string;
    public function getPrice(): int;
}

interface RealEstate {
    public function getRooms(): int;
}

abstract class Advert implements Ad, RealEstate {
    // Abstract base class with interface methods implementation
    protected $type;
    protected $rooms = 1;
    protected $price;

    function __construct(string $type, int $rooms, int $price) {
        $this->type = $type;
        $this->rooms = $rooms;
        $this->price = $price;
    }
    
    public function getCategory(): string {
        return $this->category;
    }

    public function getAdType(): string {
        return $this->type;
    }

    public function getPrice(): int {
        return $this->price;
    }

    public function getRooms(): int {
        return $this->rooms;
    }
}

class SaleAd extends Advert {
    // Child class inherited base abstract class and set the category
    public function __construct(string $type, int $rooms, int $price) {
        parent::__construct($type, $rooms, $price);
        $this->category = 'sale';
    }

    public function getCategory(): string {
        return $this->category;
    }
}

class RentAd extends Advert {
    // Child class inherited base abstract class
    // Sets the category, extends constructor and implement new method
    protected $period;

    public function __construct(string $type, int $rooms, int $price, string $period) {
        parent::__construct($type, $rooms, $price);
        $this->category = 'rent';
        $this->period = $period;
    }

    public function getCategory(): string {
        return $this->category;
    }

    public function getPeriod(): string {
        return $this->period;
    }
}

/**
 * @param $array array that will be checked
 * @return bool
 */
function checkArray($array): bool {
    $checkBaseArgs =
    array_key_exists('category', $array) &&
    array_key_exists('type', $array) &&
    array_key_exists('price', $array) &&
    array_key_exists('rooms', $array);

    if (!$checkBaseArgs) {
        return false;
    }

    $category = $array['category'];
    if ($category === 'rent') {
        return array_key_exists('period', $array);
    }

    return true;
}

/**
 * Makes array with class based Objects.
 * @param $adverts array with advertisements arrays.
 * @return array
 */
function makeAdObjArray(array $adverts): array {
    $objArray = [];
    foreach ($adverts as $advert) {
        if (!checkArray($advert)) {
            continue;
        }

        if ($advert['category'] === 'sale') {
            $adObj = new SaleAd(
                type: $advert['type'],
                rooms: $advert['rooms'],
                price: $advert['price']
            );
        } elseif ($advert['category'] === 'rent') {
            $adObj = new RentAd(
                type: $advert['type'],
                rooms: $advert['rooms'],
                price: $advert['price'],
                period: $advert['period']
            );
        } else {
            exit("Invalid adverts array!");
        }
        $objArray[] = $adObj;
    }
    return $objArray;
}

function prettifyNumber($n): string {
    $n = (0+str_replace(",","",$n));

    if(!is_numeric($n)) return 0;
    
    if ($n>1000000000000) {
        return round(($n/1000000000000),1).' трлн.';
    } else if ($n>1000000000) {
        return round(($n/1000000000),1).' млрд.';
    } else if($n>1000000) {
        return round(($n/1000000),1).' млн.';
    }
    // else if($n>1000) return round(($n/1000),1).' тысяч';

    return strval(number_format($n, thousands_separator: ' '));
}

function prettifyAd($ad): string {
    $adObjCategory = $ad->getCategory();
    $adObjRooms = $ad->getRooms();
    $adObjType = $ad->getAdType();
    $adObjPrice = $ad->getPrice();

    $prettifiedCategory = match ($adObjCategory) {
        'sale' => "Продам",
        'rent' => "Сдам",
    };

    $prettifiedType = match ($adObjType) {
        'dom' => 'дом',
        'kvartira' => 'квартиру',
    };

    $prettifiedRooms = match ($adObjType) {
        'dom' => "{$adObjRooms}-комнатный",
        'kvartira' => "{$adObjRooms}-комнатную",
    };

    $prettifiedPrice = prettifyNumber($adObjPrice);

    $adHeading = $prettifiedCategory . " "
    . $prettifiedRooms . " " . $prettifiedType
    . " за {$prettifiedPrice} тг";
    
    if ($adObjCategory === 'rent') {
        $adObjPeriod = $ad->getPeriod();
        $prettifiedPeriod = match ($adObjPeriod) {
            'month' => 'в месяц',
            'day' => 'в сутки',
        };
        $adHeading .= " {$prettifiedPeriod}";
    }

    return $adHeading;
}


$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
];

// $adverts = [];

if (empty($adverts)) {
    exit('Advertisements array is empty!');
}

$adObjects = makeAdObjArray($adverts);

foreach ($adObjects as $ad) {
    $prettifiedHeading = prettifyAd($ad);
    echo $prettifiedHeading . PHP_EOL;
}
