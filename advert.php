<?php

interface Title
{
    public function getTitle();
}

abstract class Advert
{
    protected int $rooms;
    protected float $price;
    protected string $type;

    public function setRooms(int $rooms)
    {
        $this->rooms = $rooms;
    }
    public function setPrice(float $price)
    {
        $this->price = $price;
    }
    public function setType($type)
    {
        $this->type = $type;
    }
}

class Sale extends Advert implements Title
{
    public function getTitle()
    {
        if ($this->type === "kvartira") {
            print_r("Продам квартиру" . PHP_EOL);
        } else {
            print_r("Продам дом" . PHP_EOL);
        }
        print_r("Количество комнат: {$this->rooms}" . PHP_EOL);
        $newPrice = readiblePrice($this->price);
        print_r("Цена: {$newPrice} тг." . PHP_EOL);
        print_r("============" . PHP_EOL);
    }
}

class Rent extends Advert implements Title
{
    protected string $period;

    public function setPeriod($period)
    {
        $this->period = $period;
    }
    public function getTitle()
    {
        if ($this->type === "kvartira") {
            print_r("Сдам квартиру " . $this->period . PHP_EOL);
        } else {
            print_r("Сдам дом " . $this->period . PHP_EOL);
        }
        print_r("Количество комнат: {$this->rooms}" . PHP_EOL);
        $newPrice = readiblePrice($this->price);
        $newPeriod = $this->readiblePeriod($this->period);
        print_r("Цена: {$newPrice} тг. {$newPeriod}" . PHP_EOL);
        print_r("============" . PHP_EOL);
    }

    private function readiblePeriod(string $period): string
    {
        if ($period === "посуточно") {
            return "в сутки";
        }
        return "в мес";
    }
}

function readiblePrice(float $price): string
{
    if ($price < 1000000) {
        return (string)$price;
    }

    if ($price >= 1000000 && $price < 1000000000) {
        $price = round($price / 1000000, 1);

        return "{$price} млн";
    }

    if ($price >= 1000000000 && $price < 1000000000000) {
        $price = round($price / 1000000000);
        return "{$price} млрд";
    }

    return sprintf('%d%s', floor($price / 1000000000000), ' трлн+');
}
