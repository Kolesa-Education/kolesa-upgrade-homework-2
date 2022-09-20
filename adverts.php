<?php

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
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

    function __construct($advert)
    {
        $this->rooms = $advert["rooms"];
        $this->setCategory($advert["category"]);
        $this->price = $advert["price"];
        $this->setType($advert["type"]);
        if (isset($advert["period"])) {
            $this->setPeriod($advert["period"]);
        }
    }


    protected function changePriceToString()
    {
        if ($this->price < 1000000) {
            return $this->price . ". тг" . PHP_EOL;
        }
        $buf = $this->price;
        $zero = true;
        $result = "";
        for ($counter = 0; $buf > 0; $counter++) {
            if ($counter < 6) {
                if ($buf % 10 != 0) {
                    if ($counter < 5) {
                        return $this->price . ". тг" . PHP_EOL;
                    }
                    $zero = false;
                }
                if (!$zero) {
                    $result = $buf % 10 . $result;
                }
                $buf = ($buf - $buf % 10) / 10;
                continue;
            }
            if ($counter == 6 && $result != "") {
                $result = $buf % 10 . "." . $result;
                $buf = ($buf - $buf % 10) / 10;
                continue;
            }
            $result = $buf % 10 . $result;
            $buf = ($buf - $buf % 10) / 10;
        }
        return $result . " млн. тг" . PHP_EOL;
    }

    public function setPeriod(string $period): void
    {
        if ($period == "month") {
            $this->period = " в месяц";
        } elseif ($period == "day") {
            $this->period = " в сутки";
        } else {
            $this->period = "";
        }
    }

    public function setRooms(int $rooms): void
    {
        $this->rooms = $rooms;
    }

    public function setCategory(string $category): void
    {
        if ($category != "sale" && $category != "rent") {
            echo "Не правильно указана категория!" . PHP_EOL;
            $this->category = null;
            return;
        }
        $this->category = $category;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function setType(string $type): void
    {
        if ($type != "dom" && $type != "kvartira") {
            echo "Не правильно указан тип объекта!" . PHP_EOL;
            $this->category = null;
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
        $title = "Продам " . $this->getRooms();
        if ($this->getType() == "dom") {
            $title .= "-комнатный дом за " . $this->changePriceToString() . PHP_EOL;
        } elseif ($this->getType() == "kvartira") {
            $title .= "-комнатную квартиру за " . $this->changePriceToString() . PHP_EOL;
        } else {
            $title = "не указан тип объекта" . PHP_EOL;
        }
        return $title;
    }
}

class Rent extends Adverts
{
    public function getTitle(): string
    {
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
    } else {
        $advertOfBuild = new Rent($advert);
    }
    echo $advertOfBuild->getTitle();
}
?>