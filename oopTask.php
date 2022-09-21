<?php

class Advert {
    private int $rooms;
    private string $category;
    private int $price;
    private string $type;
    private string $period;

    /**
     * @param int $rooms
     * @param string $category
     * @param int $price
     * @param string $type
     * @param string $period
     */
    public function __construct(int $rooms, string $category, int $price, string $type, string $period)
    {
        $this->rooms = $rooms;
        $this->category = $category;
        $this->price = $price;
        $this->type = $type;
        $this->period = $period;
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
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getPeriod(): string
    {
        return $this->period;
    }

    /**
     * @param string $period
     */
    public function setPeriod(string $period): void
    {
        $this->period = $period;
    }

    public function getTitle(): string {
        $this->type = ($this->type == "kvartira") ? "квартиру":"дом";

        if($this->category == 'rent') {
            $this->period = $this->period == "month" ? "месяц":"сутки";
            return sprintf("Сдам %s-комнатную %s за %s тг в %s\n",
                $this->rooms, $this->type,
                ($this->price >= 1000000) ? ($this->price/1000000 . " млн.") : $this->price, $this->period);
        } else {
            return sprintf("Продам %s-комнатный %s за %sтг\n",$this->rooms, $this->type,
                ($this->price >= 1000000) ? ($this->price/1000000 . " млн.") : $this->price);
        }
    }
}

$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'day'],
];

foreach ($adverts as $item)
{
    $period = $item['period'] ?? "";
    if ($item['category'] == 'rent') {
        $advert = new Advert($item['rooms'], $item['category'], $item['price'], $item['type'], $period);
    } else {
        $advert = new Advert($item['rooms'], $item['category'], $item['price'], $item['type'], $period);
    }
    echo $advert->getTitle();
}
?>
