<?php
class Advert
{
  private $rooms;
  private $category;
  private $price;
  private $type;
  private $period;
 
  public function __construct(int $rooms, string $category, int $price, string $type, string $period="")
  {
    $this->rooms = $rooms;
    $this->category = $category;
    $this->price = $price;
    $this->type = $type;
    $this->period = $period;
  }

  public function getTitle(): string {
        $typeOf = $this->type == "kvartira" ? "квартиру":"дом";
        $categoryOf = $this->category == "rent" ? "Сдам":"Продам";
        $periodOf = ($this->period == "" ? "\n" : (($this->period == "month" ? " месяц" : " сутки")));
        $roomOf = $this->type == "kvartira" ? "-комнатную ": "-комнатный ";
        $priceOf = $this->price>1000000 ? ($this->price/1000000)." млн " : number_format($this->price, 0, '', ' '); 
      	$output = $categoryOf . ' ' . $this->rooms . $roomOf . $typeOf . ' за ' . $priceOf . ' тг' . $periodOf;
      	return $output;
    }
}


$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
];

foreach ($adverts as $value) {
	if (array_key_exists("period", $value)) {
    	$advert = new Advert($value['rooms'], $value['category'], $value['price'], $value['type'], $value['period']);
    	echo $advert->getTitle()."<br>\n";
	}
    else{
    	$advert = new Advert($value['rooms'], $value['category'], $value['price'], $value['type']);
    	echo $advert->getTitle()."<br>\n";
    }
}
?>