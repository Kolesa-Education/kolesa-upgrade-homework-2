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
            parent::show_title();
        }
    }
}
