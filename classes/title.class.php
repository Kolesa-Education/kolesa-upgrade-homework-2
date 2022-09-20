<?php

class Title
{
    public $rooms;
    public $category;
    public $price;
    public $type;
    public $period;

    public function __construct(int $rooms, string $category, int $price, string $type, ?string $period)
    {

        $this->rooms = $rooms;
        $this->category = $category;
        $this->price = $price;
        $this->type = $type;
        $this->period = $period;

    }

    public function getTitle()
    {

        $result = "";
        if ($this->category == "sale") {
            $result .= "Продам ";
        };
        if ($this->category == "rent") {
            $result .= "Сдам ";
        }

        if ($this->type == "dom") {
            $result .= $this->rooms . "-комнатный дом ";
        };
        if ($this->type == "kvartira") {
            $result .= $this->rooms . "-комнатную квартиру ";
        }

        if ($this->price < 1000000) {
            $result .= "за " . number_format($this->price, 0, ' ', ' ') . " " . "тг";
        } else if ($this->price >= 1000000) {
            $result .= "за " . $this->price / 1000000 . " млн. тг";
        }

        if ($this->period == "month") {
            $result .= " в месяц";
        } else if ($this->period == "day") {
            $result .= " в сутки";
        } else if ($this->period == null) {
            $result .= "";
        }

        return $result;
    }
}
