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

    public function setRooms(int $rooms): void
    {
        $this->rooms = $rooms;
    }
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
    public function setType($type): void
    {
        $this->type = $type;
    }
    protected function readiblePrice(): string
    {
        if ($this->price < 1000000) {
            return (string)$this->price;
        }
        if ($this->price >= 1000000 && $this->price < 1000000000) {
            $this->price = round($this->price / 1000000, 1);

            return "{$this->price} млн";
        }
        if ($this->price >= 1000000000 && $this->price < 1000000000000) {
            $this->price = round($this->price / 1000000000);
            return "{$this->price} млрд";
        }
        return sprintf('%d%s', floor($this->price / 1000000000000), ' трлн+');
    }
}

class Sale extends Advert implements Title
{
    public function getTitle(): void
    {
        if ($this->type === "kvartira") {
            print_r("Продам квартиру" . PHP_EOL);
        } else {
            print_r("Продам дом" . PHP_EOL);
        }
        print_r("Количество комнат: {$this->rooms}" . PHP_EOL);
        print_r("Цена: {$this->readiblePrice()} тг." . PHP_EOL);
        print_r("============" . PHP_EOL);
    }
}

class Rent extends Advert implements Title
{
    protected string $period;

    public function setPeriod($period): void
    {
        $this->period = $period;
    }

    private function readiblePeriod(): string
    {
        if ($this->period === "посуточно") {
            return "в сутки";
        }
        return "в мес";
    }

    public function getTitle(): void
    {
        if ($this->type === "kvartira") {
            print_r("Сдам квартиру " . $this->period . PHP_EOL);
        } else {
            print_r("Сдам дом " . $this->period . PHP_EOL);
        }
        print_r("Количество комнат: {$this->rooms}" . PHP_EOL);
        print_r("Цена: {$this->readiblePrice()} тг. {$this->readiblePeriod()}" . PHP_EOL);
        print_r("============" . PHP_EOL);
    }
}
