<?php

class Advert {
    private int $rooms;
    private string $category;
    private int $price;
    private string $type;
    private string $period;

    public function __construct(int $rooms, string $category, int $price, string $type, string $period)
    {
        $this->rooms = $rooms;
        $this->category = $category;
        $this->price = $price;
        $this->type = $type;
        $this->period = $period;
    }

    public function getRooms(): int
    {
        return $this->rooms;
    }

    public function setRooms(int $rooms): void
    {
        $this->rooms = $rooms;
    }

    public function getCategory(): string
    {
        return $this->category;
    }
    
    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
    
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getPeriod(): string
    {
        return $this->period;
    }
    
    public function setPeriod(string $period): void
    {
        $this->period = $period;
    }

    public function getTitle(): string {
        $type = ($this->type === "kvartira") ? "квартиру":"дом";
        $price = ($this->price >= 1000000) ? ($this->price / 1000000 . " млн.") : $this->price;
        if($this->category === 'rent') {
            $period = $this->period === "month" ? "месяц":"сутки";
            return $this->getTitleRent($period,$type,$price);
        }
        return $this->getTitleSale($type,$price);

    }
    public function getTitleRent(string $period, string $type,$price): string{
        if ($this->type === "kvartira") {
            return sprintf("Сдам %s-комнатную %s за %s тг в %s\n",
                $this->rooms, $type, $price, $period);
        }
        return sprintf("Сдам %s-комнатный %s за %s тг в %s\n",
            $this->rooms, $type, $price, $period);
    }

    public function getTitleSale(string $type,$price): string{
        if ($this->type === "kvartira"){
            return sprintf("Продам %s-комнатную %s за %sтг\n",$this->rooms, $type, $price);
        }
        return sprintf("Продам %s-комнатный %s за %sтг\n",$this->rooms, $type, $price);
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
    $period = $item['period'] ?? '';
    if ($item['category'] == 'rent') {
        $advert = new Advert($item['rooms'], $item['category'], $item['price'], $item['type'], $period);
    } else {
        $advert = new Advert($item['rooms'], $item['category'], $item['price'], $item['type'], $period);
    }
    echo $advert->getTitle();
}
?>
