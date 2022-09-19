<?php

class RentableHouse extends House
{
    protected string $period = "";

    public function __construct(int $rooms, string $category, int $price, string $type, string $period)
    {
        parent::__construct($rooms, $category, $price, $type);
        $this->period = $period;
    }

    public function getTitle(): string
    {
        $title = parent::getTitle();

        $title .= $this->period == "month" ? " в месяц" : " в сутки";

        return $title;
    }
}