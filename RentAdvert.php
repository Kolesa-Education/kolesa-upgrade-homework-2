<?php
    require_once("SaleAdvert.php");

    class RentAdvert extends SaleAdvert{
        private $rooms;
        private $category;
        private $price;
        private $type;
        private $period;

        public function __construct(int $rooms, string $category, int $price, string $type, string $period)
        {
            $this->rooms = $rooms;
            $this->category = $category;
            $this->price = $price;
            $this->type = $type;
            $this->period = $period;
        }

        public function getTitle(): string
        {
            if ($this->period == "month"){
                if ($this->type == "dom"){
                    return "Сдам {$this->rooms}-комнатный дом за {$this->price} тг в месяц".PHP_EOL;
                } elseif ($this->type == "kvartira"){
                    return "Сдам {$this->rooms}-комнатную квартиру за {$this->price} тг в месяц".PHP_EOL;
                }
            } elseif ($this->period == "day"){
                if ($this->type == "dom"){
                    return "Сдам {$this->rooms}-комнатный дом за {$this->price} тг в сутки".PHP_EOL;
                } elseif ($this->type == "kvartira"){
                    return "Сдам {$this->rooms}-комнатную квартиру за {$this->price} тг в сутки".PHP_EOL;
                }
            }
        }
    }
?>