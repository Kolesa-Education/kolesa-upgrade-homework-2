<?php
require_once "AdvertAbstract.php";

class Advert extends AdvertAbstract
{
    private array $arr;
    private int $price;
    private string $type;
    private int $rooms;

    public function __construct(array $arr)
    {
        $this->arr = $arr;
        $this->price = $arr["price"];
        $this->type = $arr['type'];
        $this->rooms = $arr["rooms"];
    }

    protected function FormatPrice(): string
    {
        if ($this->price > 9999999) {
            return $this->price / 1000000 . " млн";
        } else {
            return $this->price . " тг";
        }
    }

    protected function checkCategory(): string
    {
        if (array_search("rent", $this->arr)) {
            return "Сдам";
        } else {
            return "Продам";
        }
    }

    protected function checkPeriod(): string
    {
        if (array_key_exists("period", $this->arr)) {
            if ($this->arr['period'] == "month") {
                return " в месяц";
            } else {
                return " в сутки";
            }
        }
        return "";
    }

    protected function checkType(): string
    {
        if ($this->type == "kvartira") {
            return "квартиру";
        } else {
            return "дом";
        }
    }

    protected function checkRooms(): string
    {
        if ($this->type == "kvartira") {
            return "комнатную";
        } else {
            return "комнатный";
        }
    }

    public function getTitle(): void
    {
        $result = $this->checkCategory() . " " . $this->rooms . "-" . $this->checkRooms() . " " . $this->checkType() . " за " . $this->FormatPrice() . $this->checkPeriod();
        echo $result . PHP_EOL;
    }

}
