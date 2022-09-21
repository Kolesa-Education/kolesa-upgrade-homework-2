<?php

class Advert
{
    private $advert;

    private function getType()
    {
        $type = $this->advert['type'];

        switch ($type) {
            case 'dom':
                $type = 'дом';
                break;
            case 'kvartira':
                $type = 'квартиру';
                break;
            default:
                throw new Exception('Неправильный тип');
        }
        
        return $type;
    }

    private function getRooms()
    {
        $type = $this->advert['type'];

        switch ($type) {
            case 'dom':
                $type = $this->advert['rooms'] . '-комнатный ';
                break;
            case 'kvartira':
                $type = $this->advert['rooms'] . '-комнатную ';
                break;
            default:
                throw new Exception('Неправильный тип');
        }
        
        return $type;
    }

    private function formatPrice()
    {
        $price = $this->advert['price'];
        
        if ($price < 1000000) {
            return number_format($price, 0, ',', ' ');
        }
        else {
            return round($price/1000000, 1);
        }
    }

    private function getPeriod()
    {
        $period = $this->advert['period'];
        
        switch ($period) {
            case 'month':
                $period = 'месяц';
                break;
            case 'day':
                $period = 'сутки';
                break;
            default:
                throw new Exception('Неправильный период');
        }

        return $period;
    }

    private function defineCategory($rooms, $type, $price, $period = null)
    {
        $category = $this->advert['category'];

        switch ($category) {
            case 'sale':
                $array = ['Продам ', $rooms, $type, ' за ', $price, ' млн. тг', PHP_EOL];
                $category = $this->concat($array);
                break;
            case 'rent':
                $array = ['Сдам ', $rooms, $type, ' за ', $price, ' тг в ', $period, PHP_EOL];
                $category = $this->concat($array);
                break;
            default:
                throw new Exception('Неправильная категория');
        }

        return $category;
    }

    private function concat($array)
    {
        $out = '';

        foreach ($array as $key) {
            $out = $out . $key;
        }

        return $out;
    }

    public function getTitle($advert)
    {
        $this->advert = $advert;

        $rooms = $this->getRooms();
        $type = $this->getType();
        $price = $this->formatPrice();

        if (isset($this->advert['period'])) {
            $period = $this->getPeriod();
            echo $this->defineCategory($rooms, $type, $price, $period);
        }
        else {
            echo $this->defineCategory($rooms, $type, $price);
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
    $CurrentAdvert = new Advert;
    $CurrentAdvert->getTitle($advert);
}
