<?php
require_once('IAdvert.php');

    class SaleAdvert implements IAdvert{
        private $rooms;
        private $category;
        private $price;
        private $type;
    
        public function __construct(int $rooms, string $category, int $price, string $type)
        {
                $this->rooms = $rooms;
                $this->category = $category;
                $this->price = $price;
                $this->type = $type;
        }

        public function getTitle(): string
        {
            if ($this->type == "dom"){
                if($this->price > 1000000){
                    $this->price = $this->price / 1000000;
                    return "Продам {$this->rooms}-комнатный дом за {$this->price} млн. тг".PHP_EOL;
                }

                return "Продам {$this->rooms}-комнатный дом за {$this->price} тг".PHP_EOL;
            } elseif ($this->type == "kvartira"){
                if($this->price > 1000000){
                    $this->price = $this->price / 1000000;
                    return "Продам {$this->rooms}-комнатную квартиру за {$this->price} млн. тг".PHP_EOL;
                }
                
                return "Продам {$this->rooms}-комнатную квартиру за {$this->price} тг".PHP_EOL;
            }
        }
    }
?>