<?php

namespace Advert;

abstract class Category
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRentPeriod(): string
    {
        if (method_exists($this, 'getPeriod')) {
            return $this->getPeriod();
        }

        return "";
    }
}