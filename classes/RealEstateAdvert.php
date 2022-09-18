<?php

require_once 'Advert.php';

class RealEstateAdvert extends Advert
{
    private $finalTitle = '';

    private function getTypeString(): void {
        $this->finalTitle .= match ($this->type) {
            'dom' => $this->rooms . '-комнатный дом за ',
            'kvartira' => $this->rooms . '-комнатную квартиру за ',
            default => null,
        };
    }

    private function getPriceString(): void
    {
        $this->finalTitle .= match (true) {
            $this->price > 1000000 => $this->price / 1000000 . ' млн. тг',
            $this->price > 1000000000 => $this->price / 1000000000 . ' млрд. тг',
            default => $this->price . ' тг',
        };
    }

    private function getRentableString(): void {
        $this->finalTitle = match ($this->period) {
            null => 'Продам ' . $this->finalTitle,
            default => 'Сдам ' . $this->finalTitle,
        };
        $this->finalTitle .= match ($this->period) {
            'hour' => ' в час',
            'month' => ' в месяц',
            'day' => ' в сутки',
            'year' => ' в год',
            default => null,
        };
    }

    public function getTitle(): string
    {
        $this->getTypeString();
        $this->getPriceString();
        $this->getRentableString();
        return $this->finalTitle;
    }
}