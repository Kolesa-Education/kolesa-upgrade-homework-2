<?php
require_once('Advert.php');

class AdvertsList extends Advert
{

    public $allAdverts;

    public function __construct($adverts)
    {
        $this->allAdverts = $adverts;
    }

    public function show_all_adverts()
    {
        foreach ($this->allAdverts as $advert) {
            parent::__construct($advert);
            if ($advert['category'] === 'sale' && $advert['type'] === 'dom') {
                parent::show_sale_house();
            } else if ($advert['category'] === 'sale' && $advert['type'] === 'kvartira') {
                parent::show_sale_flat();
            } else if ($advert['category'] === 'rent' && $advert['type'] === 'dom') {
                parent::show_rent_house();
            } else if ($advert['category'] === 'rent' && $advert['type'] === 'kvartira') {
                parent::show_rent_flat();
            }
        }
    }

    public function get_all_adverts()
    {
        $advertsListResult = [];
        foreach ($this->allAdverts as $advert) {
            parent::__construct($advert);
            if ($advert['category'] === 'sale' && $advert['type'] === 'dom') {
                $advertsListResult[] = parent::get_sale_house();
            } else if ($advert['category'] === 'sale' && $advert['type'] === 'kvartira') {
                $advertsListResult[] = parent::get_sale_flat();
            } else if ($advert['category'] === 'rent' && $advert['type'] === 'dom') {
                $advertsListResult[] = parent::get_rent_house();
            } else if ($advert['category'] === 'rent' && $advert['type'] === 'kvartira') {
                $advertsListResult[] = parent::get_rent_flat();
            }
        }
        return $advertsListResult;
    }
}
