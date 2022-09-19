<?php

class Advert
{
    private $adverts = [
        ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
        ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
        ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
        ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
    ];

    public function getTitle()
    {
        foreach ($this->adverts as $advert) {
            $rooms = $advert['type'] == 'dom' ? $advert['rooms'] . '-комнатный ' : $advert['rooms'] . '-комнатную ';
            $type = $advert['type'] == 'dom' ? 'дом' : 'квартиру';
            $price = $advert['price'] < 1000000 ? number_format($advert['price'], 0, ',', ' ') : round($advert['price']/1000000, 1);

            if ($advert['category'] == 'sale') {
                echo 'Продам ' . $rooms . $type . ' за ' . $price . ' млн. тг' . PHP_EOL;
            }
            else {
                $period = $advert['period'] == 'month' ? 'месяц' : 'сутки';
                echo 'Сдам ' . $rooms . $type . ' за ' . $price . ' тг в ' . $period . PHP_EOL;
            }
        }
    }
}

$advert = new Advert;
$advert->getTitle();