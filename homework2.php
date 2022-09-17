<?php
class Advert
{
    private $rooms;
    private $type;
    private $price;
    private $category;
    private $period;

    public function __construct($rooms, $category, $price, $type, $period = NULL) {
        $this->rooms=$rooms;
        $this->type=$type;
        $this->price=$price;
        $this->category=$category;
        $this->period=$period;
    }

    function getRooms(){
        return $this->rooms;
    }
    
    public function getType(){
        return $this->type;
    }
    
    public function getPrice(){
        return $this->price>1000000 ? ($this->price/1000000)." млн " : number_format($this->price, 0, '', ' ');
    }

    public function getCategory(){
        return $this->category;
    }

    public function getPeriod(){
        return $this->period;
    }

    public function getTitle($category, $rooms, $type, $price, $period=NULL){
        return (is_null($period) and $type=="дом") ? " • ".$category." ".$rooms."-комнатный ".$type." за ".$price." тг" : " • ".$category." ".$rooms."-комнатную ".$type." за ".$price." тг в ".$period;       
    }

}


$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'day'],
];

foreach($adverts as $v1){
    $v1['category'] = ($v1['category'] == "sale") ? "Продам" : "Сдам";
    $v1['type'] = ($v1['type'] == "dom") ? "дом" : "квартиру";
    if (array_key_exists('period', $v1)){
        $v1['period'] = ($v1['period'] == "month") ? "месяц" : "день";
        $objAdvert = new Advert($v1['rooms'], $v1['category'], $v1['price'], $v1['type'], $v1['period']);
    } else {
        $objAdvert = new Advert($v1['rooms'], $v1['category'], $v1['price'], $v1['type']);
    }
    echo $objAdvert->getTitle($objAdvert->getCategory(), $objAdvert->getRooms(), $objAdvert->getType(), $objAdvert->getPrice(), $objAdvert->getPeriod())."<br>\n";
}
