<?php

namespace App;

use App\Adverts\RentAdvert;
use App\Adverts\SaleAdvert;

function advertCreator(array $params): SaleAdvert|RentAdvert
{
    return match ($params['category']) {
        'sale' => new SaleAdvert($params['price'], $params['type'], $params['rooms']),
        'rent' => new RentAdvert($params['price'], $params['type'], $params['rooms'], $params['period']),
    };
}
