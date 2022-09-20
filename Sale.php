<?php
require_once 'Advert.php';


class Sale extends Advert implements iAdvertGenerator
{
    public function getTitle(): void
    {
        $type = $this->formatTypeToHuman();
        $price = $this->formatPriceToHuman();

        echo "Продам " . $this->rooms . $type . $price;
        echo PHP_EOL;
    }
}

