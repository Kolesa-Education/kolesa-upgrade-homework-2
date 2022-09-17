<?php


namespace Advert;

include_once 'Advert.php';
include_once 'Flat.php';
include_once 'House.php';
include_once 'Rent.php';
include_once 'Sale.php';
include_once 'periods.php';

use Exception;

class AdvertFactory
{
    public function createAdvert(array $advert)
    {
        try {
            if (!is_numeric($advert['price'])) {
                throw new Exception('Price should be a numeric');
            }

            if (!is_int($advert['rooms'])) {
                throw new Exception('Rooms should be an integer');
            }

            if ($advert['category'] == 'sale') {
                $category = new Sale();
            } elseif ($advert['category'] == 'rent') {
                if (!in_array($advert['period'], PERIODS)) {
                    throw new Exception('Invalid period');
                }

                $category = new Rent($advert['period']);
            } else {
                throw new Exception('Invalid category');
            }

            if ($advert['type'] == 'dom') {
                $livingSpace = new House($advert['rooms']);
            } elseif ($advert['type'] == 'kvartira') {
                $livingSpace = new Flat($advert['rooms']);
            } else {
                throw new Exception('Invalid living space');
            }

            return new Advert($advert['price'], $category, $livingSpace);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage() . '<br>';
        }
    }
}
