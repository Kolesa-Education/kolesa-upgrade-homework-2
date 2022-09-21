<?php
 require_once 'Sale.php';
 require_once 'Rent.php';
class Advert {
    public int $rooms;
    public string $category;
    public int $price;
    public string $type;
    public string $period;

    public function __construct($rooms, $category, $price, $type, $period) {
        $this->rooms = $rooms;
        $this->category = $category;
        $this->price = $price;
        $this->type = $type;
        $this->period = $period;
    }

    public function getTitleRent(): string{
        $result = "";
        if ($this->category == "rent"){
            $result .= "Сдам ";
        }
        if ($this->type == "dom") {
            $result .= $this->rooms." - комнатный дом";
        } else {
            $result .= $this->rooms." - комнатную квартиру";
        }
        if ($this->price > 1000000) {
            $result .= " за ".substr($this->price, 0, 2)." млн тг";
        } else {
            $result .= " за ". $this->price." тг";
        }
        if ($this->period == "month") {
            $result .= " в месяц";
        } else if ($this->period == "day") {
            $result .= " в сутки";
        } else if ($this->period == NULL) {
            $result .= "";
        }
        
        return $result;
    }

    public function getTitleSale(): string{
        $result = "";
        if ($this->category == "sale"){
            $result .= "Продам ";
        }
        if ($this->type == "dom") {
            $result .= $this->rooms." - комнатный дом";
        } else {
            $result .= $this->rooms." - комнатную квартиру";
        }
        if ($this->price > 1000000) {
            $result .= " за ".substr($this->price, 0, 2)." млн тг";
        } else {
            $result .= " за ". $this->price." тг";
        }
        if ($this->period == "month") {
            $result .= " в месяц";
        } else if ($this->period == "day") {
            $result .= " в сутки";
        } else if ($this->period == NULL) {
            $result .= "";
        }
        
        return $result;
    }
}
?>