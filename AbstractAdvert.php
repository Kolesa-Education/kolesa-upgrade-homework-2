<?php

interface Title
{
    public function getTitle();
}

abstract class Advert
{
    protected $category;
    protected $price;

    public function __construct(string $category, int $price)
    {
        $this->category = $category;
        $this->price = $price;

    }


}