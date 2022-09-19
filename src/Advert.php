
<?php

require_once 'Title.php';

abstract class Advert implements Title
{
    protected $rooms;
    protected $price;
    protected $type;
    protected $period;

    protected function get_formatted_price()
    {
        $price_size = (int) log10($this->price);
        if ($price_size >= 6 && $this->price % 10 ** 5 == 0) {
            $formatted_price = (string) ($this->price / 10 ** 6);
            return  $formatted_price . ' млн. тг';
        } elseif ($price_size < 6 && $price_size >= 3 && $this->price % 10 ** 2 == 0) {
            $formatted_price = (string) ($this->price / 10 ** 3);
            return $formatted_price . ' тыс. тг';
        } else {
            $formatted_price = (string) ((int) $this->price);
            return $formatted_price . ' тг';
        }
    }

    protected function get_house_type()
    {
        if ($this->type == 'dom') {
            return 'комнатный дом';
        } elseif ($this->type == 'kvartira') {
            return 'комнатную квартиру';
        } else {
            return $this->type;
        }
    }

    protected function get_rent_period()
    {
        if ($this->period == 'month') {
            return 'в месяц';
        } elseif ($this->period == 'day') {
            return 'в сутки';
        } else {
            return $this->period;
        }
    }

    abstract public function get_title(): string;
}

// EOF