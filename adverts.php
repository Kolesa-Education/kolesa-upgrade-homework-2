<?php

$adverts = [
    ['rooms' => 0, 'category' => 'sale', 'price' => -1, 'type' => 'hata'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
];

abstract class Adverts
{

    private int $rooms;
    private string $category;
    private int $price;
    private string $type;
    private string $period;
    protected bool $status = true;

    function __construct($advert)
    {
        if (!isset($advert["rooms"]) || !isset($advert["category"]) || !isset($advert["price"]) || !isset($advert["type"])) {
            $this->status = false;
            return;
        }
        $this->setRooms($advert["rooms"]);
        $this->setCategory($advert["category"]);
        $this->setPrice ($advert["price"]);
        $this->setType($advert["type"]);
        if (isset($advert["period"])) {
            $this->setPeriod($advert["period"]);
        }
    }


    protected function changePriceToString()
    {
        if ($this->price < 1000000) {
            return number_format($this->price, 0, ".", " ") . " тг";
        }
        if ($this->price % 10 ** 5 == 0) {
            return $this->price / 10 ** 6 . " млн. тг";
        }
        return number_format($this->price, 0, ".", " ") . " тг";
    }

    public function setPeriod(string $period): void
    {
        if ($period == "month") {
            $this->period = " в месяц";
        } elseif ($period == "day") {
            $this->period = " в сутки";
        } else {
            $this->status = false;
        }
    }

    public function setRooms(int $rooms): void
    {
        if ($rooms < 1&&isset($this->rooms)){
            echo "количество комнат устанавливается только раз и изменить его нельзя" . PHP_EOL;
            return;
        }
        if ($rooms < 1&&!isset($this->rooms)) {
            echo "не удалось указать количество комнат введенные данные некорректные" . PHP_EOL;
            $this->status = false;
            return;
        }
        $this->rooms = $rooms;
    }

    protected function setCategory(string $category): void
    {
        if ($category != "sale" && $category != "rent" && $this->category == null) {
            $this->status = false;
            return;
        }
        $this->category = $category;
    }

    public function setPrice(int $price): void
    {
        if ($price < 0 && !isset($this->price)) {
            echo "не удалось назначить цену введенные данные некорректные" . PHP_EOL;
            $this->status = false;
            return;
        }elseif ($price < 0 && isset($this->price)){
            echo "не удалось изменить цену введенные данные некорректные" . PHP_EOL;
            return;
        }
        $this->price = $price;
    }

    public function setType(string $type): void
    {
        if(isset($this->type)){
            echo "тип объекта можно указывать только один раз";
            return ;
        }
        if ($type != "dom" && $type != "kvartira"&&!isset($this->type)) {
            echo "тип объекта неправильно указан" . PHP_EOL;
            $this->status = false;
            return;
        }
        $this->type = $type;
    }


    public function getRooms(): int
    {
        return $this->rooms;
    }

    public function getCategory(): string
    {
        return $this->category;
    }


    public function getPrice(): int
    {
        return $this->price;
    }


    public function getType(): string
    {
        return $this->type;
    }

    public function getPeriod(): string
    {
        return $this->period;
    }


    abstract function getTitle();
}

class Sale extends Adverts
{
    public function getTitle(): string
    {
        if (!$this->status) {
            return "данные неверны, нужна корректировка" . PHP_EOL;
        }
        $title = "Продам " . $this->getRooms();
        if ($this->getType() == "dom") {
            $title .= "-комнатный дом за " . $this->changePriceToString() . PHP_EOL;
        } elseif ($this->getType() == "kvartira") {
            $title .= "-комнатную квартиру за " . $this->changePriceToString() . PHP_EOL;
        }else {
            $title = "не указан тип объекта" . PHP_EOL;
        }
        return $title;
    }
}

class Rent extends Adverts
{
    public function getTitle(): string
    {
        if (!$this->status) {
            return "данные неверны, нужна корректировка" . PHP_EOL;
        }
        $title = "Сдам " . $this->getRooms();
        if ($this->getType() == "dom") {
            $title .= "-комнатный дом за " . $this->changePriceToString() . $this->getPeriod() . PHP_EOL;
        } elseif ($this->getType() == "kvartira") {
            $title .= "-комнатную квартиру за " . $this->changePriceToString() . $this->getPeriod() . PHP_EOL;
        } else {
            $title = "не указан тип объекта" . PHP_EOL;
        }
        return $title;
    }
}

foreach ($adverts as $advert) {
    if ($advert["category"] == "sale") {
        $advertOfBuild = new Sale($advert);
        echo $advertOfBuild->getTitle();
    } elseif ($advert["category"] == "rent") {
        $advertOfBuild = new Rent($advert);
        echo $advertOfBuild->getTitle();
    } else {
        echo "укажите категорию объявления" . PHP_EOL;
    }
}
?>