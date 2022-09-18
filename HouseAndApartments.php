<?php
require_once 'Advert.php';

class HouseAndApartments extends Advert
{
    public function getTitle(): void
    {
        $category = $this->formatCategoryToHuman();
        $type = $this->formatTypeToHuman();
        $price = $this->formatPriceToHuman();
        $period = $this->formatPeriodToHuman();

        echo $category . $this->rooms . $type . $price . $period;
        echo PHP_EOL;
    }
}

