<?php
 require_once 'Advert.php';
    class Sale extends Advert{
        public int $rooms;
        public string $category;
        public int $price;
        public string $type;
        public string $period;
            public function __construct($rooms, $category, $price, $type, $period) {
                parent::__construct($rooms, $category, $price, $type, $period);
            }
            public function getTitle(): string{
                return $this->getTitleSale();
            }
    }
?>