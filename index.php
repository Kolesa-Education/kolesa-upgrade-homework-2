<?php
interface AdvertFormatter {
  public function getTitle() : string;
}

abstract class Advert {
  private $rooms;
  private $category;
  private $price;
  private $type;

  public function __construct(int $rooms, string $category, int $price, string $type)
  {
    $this->setRooms($rooms);
    $this->setCategory($category);
    $this->setPrice($price);
    $this->setType($type);
  }

  public function setRooms(int $rooms) : void
  {
    $this->rooms = $rooms;
  }

  public function getRooms() : int
  {
    return $this->rooms;
  }

  public function setCategory(string $category) : void
  {
    $this->category = $category;
  }

  public function getCategory() : string
  {
    return $this->category;
  }

  public function setPrice(int $price) : void
  {
    $this->price = $price;
  }

  public function getPrice() : int
  {
      return $this->price;
  }

  public function setType(string $type) : void
  {
    $this->type = $type;
  }

  public function getType() : string
  {
    return $this->type;
  }
  
  public function getFormattedPrice($price) : string
  {
    switch($price) {
      case floor($price / (10**9)) > 0:
        return $price/ 10**9 . " млрд. тг";
      case floor($price / (10**6)) > 0:
        return $price/(10**6). " млн. тг";
      case floor($price / (10**3)) > 0:
        return $price/(10**3). " тыс. тг";
      default:
        return $price . " тг";
    }
  }
  public function getFormattedType($type) : string
  {
    switch($type) {
      case $type === "dom":
        return "комнатный дом";
      case $type === "kvartira":
        return "комнатную квартиру";
      default:
        return "комнатное имущество";
    }
  }

}

class SaleAdvertFormatter extends Advert implements AdvertFormatter 
{
  public function getTitle() : string
  {
    return sprintf("Продам %s-%s за %s.",
      $this->getRooms(), $this->getFormattedType($this->getType()), $this->getFormattedPrice($this->getPrice()));
  }
}

class RentAdvertFormatter extends Advert implements AdvertFormatter 
{
  private $period;

  public function __construct($rooms, $category, $price, $type, $period)
  {
    parent::__construct($rooms, $category, $price, $type);
    $this->setPeriod($period);
  }

  public function setPeriod($period) : void
  {
    $this->period = $period;
  }

  public function getPeriod() : string
  {
    return $this->period;
  }

  public function getFormattedPeriod($period) : string
  {
    switch($period) {
      case $period === "month":
        return "месяц";
      case $period === "day":
        return "сутки";
      default:
        return "договорной срок";
    }
  }
  public function getTitle() : string
  {
    return sprintf("Сдам %s-%s за %s в %s.",
      $this->getRooms(), $this->getFormattedType($this->getType()), $this->getFormattedPrice($this->getPrice()), $this->getFormattedPeriod($this->getPeriod()));
  }
}

class AdvertFormatterFactory {
  public static function create($advert) : AdvertFormatter
  {
    if ($advert["category"] === "sale") {
      return new SaleAdvertFormatter($advert["rooms"], $advert["category"], $advert["price"], $advert["type"]);
    } else {
      return new RentAdvertFormatter($advert["rooms"], $advert["category"], $advert["price"], $advert["type"], $advert["period"]);
    }
  }
}

class MyException extends Exception { }

$adverts = [
  ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
  ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
  ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
  ['rooms' => 1, 'category' => 'rent', 'price' => 150000, 'type' => 'kvartira', 'period' => 'day'],
 ];

foreach ($adverts as $advert) {
  $advertFormatter = AdvertFormatterFactory::create($advert);
  echo $advertFormatter->getTitle() . "\n";
}