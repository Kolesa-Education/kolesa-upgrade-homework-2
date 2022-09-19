<?php
class Advert {
    public int $rooms;
    public string $category;
    public int $price;
    public string $type;
    public string $period;

        public function __construct($rooms, $category, $price, $type, $period) {
            $this->rooms = $rooms;
            $this->category = $category;
            $this->price = $price;
            $this->type = $type;
            $this->period = $period;
        }
        
        public function getTitle() {
            $result = "";
            if ($this->category == "sale") {
                $result .= "Продам ";
            } else if ($this->category == "rent") {
                $result .= "Сдам ";
            }
            if ($this->type == "dom") {
                $result .= $this->rooms." - комнатный дом";
            } else {
                $result .= $this->rooms." - комнатную квартиру";
            }
            if ($this->price > 1000000) {
                $result .= " за ".substr($this->price, 0, 2)." млн тг";
            } else {
                $result .= " за ". $this->price." тг";
            }
            if ($this->period == "month") {
                $result .= " в месяц";
            } else if ($this->period == "day") {
                $result .= " в сутки";
            } else if ($this->period == NULL) {
                $result .= "";
            }
            
            return $result;
  }
}
$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'day'],
];
    foreach ($adverts as $value) {
        $adv = new Advert($value['rooms'], $value['category'], $value['price'], $value['type'], $value['period'] ?? "");
        echo $adv->getTitle()."<br>";
}
?>