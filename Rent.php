<?php

namespace Advert;

include_once 'Category.php';

class Rent extends Category
{
    private string $period;

    public function __construct(string $period)
    {
        parent::__construct('rent');

        if ($period == 'month') {
            $period = 'месяц';
        } elseif ($period == 'day') {
            $period = 'день';
        }

        $this->period = $period;
    }

    public function getPeriod(): string
    {
        return $this->period;
    }
}