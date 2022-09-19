<?php
class Distributor
{
    protected $advertObjects = array();
    public function __construct($adverts)
    {
        foreach ($adverts as $advert) {

            $objectToAdvert = match ($advert['type']) {
                'dom' => new Home($advert['rooms']),
                'kvartira' => new Appartment($advert['rooms']),
            };

            $advertObject = match ($advert['category']) {
                'sale' => new SaleAdvert($advert['price'], $objectToAdvert),
                'rent' => new RentAdvert($advert['price'], $advert['period'], $objectToAdvert),
            };
            array_push($this->advertObjects, $advertObject);
        }
    }

    public function printAdvertTitles()
    {
        foreach ($this->advertObjects  as $advert) {
            echo $advert->getTitle() . "<br>\n";
        }
    }
}
