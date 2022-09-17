
<?php

abstract class Advert_class
{
    protected $rooms;
    protected $category;
    protected $price;
    protected $type;
    protected $period;

    protected function set_print_price()
    {
        $price_size = (int) log10($this->price);
        if ($price_size >= 6 && $this->price % 10 ** 5 == 0) {
            $print_price = (string) ($this->price / 10 ** 6) . " млн. тг";
        } elseif ($price_size < 6 && $price_size >= 3 && $this->price % 10 ** 2 == 0) {
            $print_price = (string) ($this->price / 10 ** 3) . " тыс. тг";
        } else {
            $print_price = (string) ((int) $this->price) . " тг";
        }
        return $print_price;
    }

    protected function set_print_type()
    {
        if ($this->type == "dom") {
            $print_type = "комнатный дом";
        } elseif ($this->type == "kvartira") {
            $print_type = "комнатную квартиру";
        } else {
            $print_type = $this->type;
        }
        return $print_type;
    }

    protected function set_print_period()
    {
        if ($this->period == "month") {
            $print_period = "в месяц";
        } elseif ($this->period == "day") {
            $print_period = "в сутки";
        } else {
            $print_period = $this->period;
        }
        return $print_period;
    }

    abstract public function get_title(): string;
}
