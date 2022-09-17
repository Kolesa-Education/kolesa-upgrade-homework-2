<?php


namespace Advert;

include_once 'PostInterface.php';

class Advert implements PostInterface
{
    private float $price;
    private Category $category;
    private LivingSpace $livingSpace;

    public function __construct(float $price, Category $category, LivingSpace $livingSpace)
    {
        $this->price = $price;
        $this->category = $category;
        $this->livingSpace = $livingSpace;
    }

    public function getFormatStringPrice(): string
    {
        if ($this->price >= 1000000) {
            return $this->price / 1000000 . ' млн.';
        }

        return number_format($this->price, 0, '', ' ');
    }

    public function getTitle(): string
    {
        if ($this->livingSpace instanceof House) {;
            return $this->formatHouseTitle();
        } elseif ($this->livingSpace instanceof Flat) {
            return $this->formatFlatTitle();
        }

        return 'Invalid living space type';
    }

    public function formatHouseTitle(): string
    {
        $text = 'комнатный дом';

        return $this->formatTitle($text);
    }

    public function formatFlatTitle(): string
    {
        $text = 'комнатную квартиру';

        return $this->formatTitle($text);
    }

    public function formatTitle(string $text): string
    {
        $saleText = "Продам {$this->livingSpace->getRooms()}-{$text} за {$this->getFormatStringPrice()} тг";
        $rentText = "Сдам {$this->livingSpace->getRooms()}-{$text} за {$this->getFormatStringPrice()} тг в {$this->category->getRentPeriod()}";

        if ($this->category instanceof Sale) {
            return $saleText;
        } elseif ($this->category instanceof Rent) {
            return $rentText;
        }

        return 'Invalid category type';
    }
}
