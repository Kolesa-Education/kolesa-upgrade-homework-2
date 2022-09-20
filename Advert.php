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
        return $this->category->getTitle($this->livingSpace, $this->getFormatStringPrice());
    }
}
