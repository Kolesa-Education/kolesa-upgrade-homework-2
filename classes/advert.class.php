<?php

interface Title
{
    public function getTitle();
}



class Price extends Advert implements Title
{
    protected int $price;

    public function getPrice($price)
    {
        if ($price < 1000000) {
            $this->price = "за " . number_format($this->price, 0, ' ', ' ') . " " . "тг";
        } else if ($price >= 1000000) {
            $this->price = "за " . $this->price / 1000000 . " млн. тг";
        }
        return $this->price;
    }

    public function getTitle() {}
}



class Period extends Advert implements Title
{
    protected ?string $period;

    public function getPeriod($period)
    {
        if ($period == "month") {
            $this->period = " в месяц";
        } else if ($period == "day") {
            $this->period = " в сутки";
        } else if ($period == null) {
            $this->period = "";
        }
        return $this->period;
    }

    public function getTitle() {}
}



abstract class Advert
{
    protected string $category;
    protected int $rooms;
    protected string $type;

    public function __construct($rooms, $category, $type)
    {
        $this->rooms = $rooms;
        $this->category = $category;
        $this->type = $type;
    }

    public function getCategory($category)
    {
        if ($category == "sale") {
            $this->category = "Продам ";
        };
        if ($category == "rent") {
            $this->category = "Сдам ";
        }
        return $this->category;
    }

    public function getType($type) 
    {

        if ($type == "dom") {
            $this->type = $this->rooms . "-комнатный дом ";
        };
        if ($type == "kvartira") {
            $this->type = $this->rooms . "-комнатную квартиру ";
        }
        return $this->type;
    }

    abstract public function getAdvert(Title $advert)
    {
        $advert->getTitle();
    }
}