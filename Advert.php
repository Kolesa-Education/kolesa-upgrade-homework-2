<?php
require_once "AdvertAbstract.php";

class Advert extends AdvertAbstract
{
    private array $arr;
    private int $price;
    private string $type;
    private int $rooms;
    private string $period="";

    public function __construct(array $arr)
    {
        $this->arr = $arr;
        $this->price = $arr["price"];
        $this->type = $arr['type'];
        $this->rooms = $arr["rooms"];
       $this->fmtPeriod();

    }
    protected function fmtPeriod(){
        if(array_key_exists('period', $this->arr)){
            $this->period=$this->arr['period'];
        }
    }

    protected function formatPrice(): string
    {
        if ($this->price > 9999999) {
            return $this->price / 1000000 . " млн";
        } else {
            return $this->price . " тг";
        }
    }

    protected function formatCategory(): string
    {
        if (array_search("rent", $this->arr)) {
            return "Сдам";
        } else {
            return "Продам";
        }
    }

    protected function formatPeriod(): string
    {
        if (empty($this->period)) {
            if ($this->period == "month") {
                return " в месяц";
            } else {
                return " в сутки";
            }
        }
        return "";
    }

    protected function formatType(): string
    {
        if ($this->type == "kvartira") {
            return "квартиру";
        } else {
            return "дом";
        }
    }

    protected function formatRooms(): string
    {
        if ($this->type == "kvartira") {
            return "комнатную";
        } else {
            return "комнатный";
        }
    }

    public function getTitle(): void
    {
        $result = $this->formatCategory() . " " . $this->rooms . "-" . $this->formatCategory() . " " . $this->formatCategory() . " за " . $this->formatPrice() . $this->formatPeriod();
        echo $result . PHP_EOL;
    }

}
