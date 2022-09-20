<?php

require_once 'Advert.php';

class Rent extends Advert implements iAdvertGenerator
{

    public function formatPeriodToHuman(): string
    {
        if ($this->period === 'month') {
            return ' в месяц';
        } elseif ($this->period === 'day') {
            return ' в сутки';
        } else {
            return '';
        }
    }

    public function getTitle(): void
    {
        $type = $this->formatTypeToHuman();
        $price = $this->formatPriceToHuman();
        $period = $this->formatPeriodToHuman();

        echo "Cдам " . $this->rooms . $type . $price . $period;
        echo PHP_EOL;
    }

    public function totalPrice(int $days): void
    {
        if ($this->period === 'month') {
            $totalPrice = ($this->price / 30) * $days;
        } else {
            $totalPrice = $this->price * $days;
        }

        if ($totalPrice < 1000000) {
            $totalPrice = sprintf('%d', $totalPrice);
            echo "Общая стоимость составляет " . $totalPrice . " тг за выбранный период";
            echo PHP_EOL;
        } elseif ($totalPrice < 1000000000) {
            $totalPrice = $totalPrice / 1000000;
            echo "Общая стоимость составляет " . $totalPrice . " млн.тг за выбранный период";
            echo PHP_EOL;
        }
    }
}