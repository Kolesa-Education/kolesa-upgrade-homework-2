<?php


namespace Advert;

include 'PostInterface.php';

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
        $price = $this->price;

        if ($price >= 1000000) {
            $price = $this->price / 1000000 . ' млн.';
        }

        return $price;
    }

    public function getTitle(): string
    {
        $title = "";

        $categoryName = $this->category->getName();
        $livingSpaceType = $this->livingSpace->getType();

        if ($livingSpaceType == 'dom') {
            $title = "{$this->livingSpace->getRooms()}-комнатный дом за {$this->getFormatStringPrice()} тг";
        } elseif ($livingSpaceType == 'kvartira') {
            $title = "{$this->livingSpace->getRooms()}-комнатную квартиру за {$this->getFormatStringPrice()} тг";
        }

        if ($categoryName == 'sale') {
            $begin = 'Продам';
            $title = $begin . ' ' . $title;
        } elseif ($categoryName == 'rent') {
            $begin = 'Сдам ';
            $end = "в {$this->category->getRentPeriod()}";
            $title = $begin . ' ' . $title . ' ' . $end;
        }

        return $title;
    }
}