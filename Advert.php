<?php

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

    function formatCategoryToHuman(): string
    {
        if ($this->category === 'sale') {
            return 'Продам ';
        } else {
            return 'Сдам ';
        }
    }

    function formatPriceToHuman(): string
    {
        if ($this->price < 1000) {
            return sprintf('%d', $this->price) . ' тг';
        }

        if ($this->price < 1000000) {
            $price = $this->price / 1000;
            return number_format($price, 1) . ' тыс.тг';
        }

        if ($this->price < 1000000000) {
            $price = $this->price / 1000000;
            return number_format($price, 1) . ' млн.тг';
        }

        $price = $this->price / 1000000000;

        return number_format($price, 1) . ' млрд.тг';
    }

    function formatTypeToHuman(): string
    {
        if ($this->type === 'dom') {
            return '-комнатный дом за ';
        } else {
            return '-комнатную квартиру за ';
        }
    }

    function formatPeriodToHuman(): string
    {
        if ($this->period === 'month') {
            return ' в месяц';
        } elseif ($this->period === 'day') {
            return ' в сутки';
        } else {
            return '';
        }
    }

    abstract function getTitle(): void;
}