<?php
require_once "AdvertsInterface.php";

class Adverts
{
    private array $arr;

    public function __construct(array $arr)
    {
        $this->arr = $arr;
    }

    protected function checkPrice(): string
    {
        if ($this->arr["price"] > 9999999) {
            return $this->arr["price"] / 1000000 . " млн";
        } else {
            return $this->arr['price'] . " тг";
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

    protected
    function checkType(): string
    {
        if ($this->arr["type"] == "kvartira") {
            return "квартиру";
        } else {
            return "дом";
        }
    }

    protected function checkRooms()
    {
        if ($this->arr['type'] == "kvartira") {
            return "комнатную";
        } else {
            return "комнатный";
        }
    }

    public function getTitle(): void
    {
        $result = $this->checkCategory() . " " . $this->arr['rooms'] . "-" . $this->checkRooms() . " " . $this->checkType() . " за " . $this->checkPrice() . $this->checkPeriod();
        echo $result . PHP_EOL;
    }


}
