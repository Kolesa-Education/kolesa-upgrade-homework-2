<?php
require_once 'Interface.php';

abstract class Advert
{
    public int $rooms;
    public string $category;
    public int $price;
    public string $type;
    public string $period = '';



    public function __construct(array $advertisement)
    {
        $this->rooms = $advertisement['rooms'];
        $this->category = $advertisement['category'];
        $this->price = $advertisement['price'];
        $this->type = $advertisement['type'];
        if (isset($advertisement['period'])) {
            $this->period = $advertisement['period'];
        }
    }


    public function formatPriceToHuman(): string
    {
        if ($this->price < 1000) {
            return sprintf('%d', $this->price) . ' тг';
        }

        if ($this->price < 1000000) {
            return sprintf('%d', $this->price) . ' тг';
        }

        if ($this->price < 1000000000) {
            $price = $this->price / 1000000;
            return number_format($price, 1) . ' млн.тг';
        }

        $price = $this->price / 1000000000;

        return number_format($price, 1) . ' млрд.тг';
    }

    public function formatTypeToHuman(): string
    {
        if ($this->type === 'dom') {
            return '-комнатный дом за ';
        } else {
            return '-комнатную квартиру за ';
        }
    }

}