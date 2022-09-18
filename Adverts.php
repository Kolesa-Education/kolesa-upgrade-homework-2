<?php

class Adverts
{
    private $arr;
    private $rent = [];
    private $sale = [];
    private $result = [];

    function __construct($arr)
    {
        $this->arr = $arr;
    }

//разделить на категории
    function arr_split()
    {
        foreach ($this->arr as $key) {
            if (array_search("rent", $key)) {
                array_push($this->rent, $key);
            } else
                array_push($this->sale, $key);
        }
    }

    function createTitleForRent()
    {
        foreach ($this->rent as $item) {
            if ($item['type'] === "kvartira" && $item['period'] == 'month')
                array_push($this->result, "Сдам " . $item["rooms"] . " квартиру за " . $item["price"] . " в месяц ");
            else
                array_push($this->result, "Сдам " . $item["rooms"] . " квартиру за " . $item["price"] . " в сутки ");
        }
    }

    function createTitleForSales()
    {
        foreach ($this->sale as $item) {
            if ($item['type'] === "dom")
                array_push($this->result, "Продам " . $item["rooms"] . " комнатный дом за " . $item["price"] . "тг");
            else
                array_push($this->result, "Продам " . $item["rooms"] . "-комнатную квартиру за " . $item["price"] . "тг");
        }
    }

    public function getTitle()
    {
        $this->arr_split();
        $this->createTitleForSales();
        $this->createTitleForRent();
        foreach ($this->result as $item) {
            echo $item . PHP_EOL;
        }
    }
}
