<?php

interface Advert
{
    public function getTitle(): string;
}

abstract class House
{
    private int $price;
    private int $rooms;
    private string $type;
    private string $category;

    public function __construct($price, $rooms, $type, $category)
    {
        $this->price = $price;
        $this->rooms = $rooms;
        $this->type = $type;
        $this->category = $category;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getRooms(): int
    {
        return $this->rooms;
    }

    /**
     * @param int $rooms
     */
    public function setRooms(int $rooms): void
    {
        $this->rooms = $rooms;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }
    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public function getPriceForTitle(): string
    {
        if($this->price >= 1e6) {
            $this->price /= 1e6;
            return $this->price . " млн";
        }
        return $this->price . " тг";
    }

    public function getTypeForTitle(): string
    {
        return $this->type === "dom" ? "дом" : "квартиру";
    }
}

class Rent extends House implements Advert
{
    private string $period;
    public function __construct($price, $rooms, $type, $category)
    {
        parent::__construct($price, $rooms, $type, $category);
    }
    /**
     * @param mixed $period
     */
    public function setPeriod(string $period): void
    {
        if($this->period === "month") {
            $period = "месяц";
        } else {
            $period = "сутки";
        }
        $this->period = $period;
    }

    /**
     * @return mixed
     */
    public function getPeriod(): string
    {
        return $this->period;
    }

    public function getTitle(): string
    {
        return sprintf("Сдам %s-комнатную %s за %s в %s" . PHP_EOL,
            $this->getRooms(), $this->getTypeForTitle(), $this->getPriceForTitle(), $this->getCategory());
    }
}

class Sale extends House implements Advert
{
    public function getTitle(): string
    {
        return sprintf("Продам %s-комнатный %s за %s" . PHP_EOL,
            $this->getRooms(), $this->getTypeForTitle(), $this->getPriceForTitle());
    }
}

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
];

foreach ($adverts as $advert) {
    if($advert['category'] === 'sale') {
        $advert = new Sale($advert['price'], $advert['rooms'], $advert['type'], $advert['category']);
    } else {
        $advert = new Rent($advert['price'], $advert['rooms'], $advert['type'], $advert['category'], $advert['period']);
    }
    echo $advert->getTitle();
}