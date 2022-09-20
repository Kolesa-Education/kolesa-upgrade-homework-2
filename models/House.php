<?php
declare(strict_types=1);

class House extends Advert
{
    protected  string $type;

    public function __construct(int $rooms,string $category,int $price,string $type)
    {
        parent::__construct($rooms,$category,$price);
        $this->type = $type;

    }

    public function getType()
    {
        return $this->type;
    }


    public function setType($type): void
    {
        $this->type = $type;
    }

    public function getTitle()
    {
        if ($this->type=="dom" && $this->category=="sale") {
            $newPrice = $this->getPrice();
            $newPrice /= 1000000;
            return "Продам $this->rooms-комнатный дом за $newPrice млн. тг <br>";
        } elseif ($this->type=="kvartira" && $this->category=="sale" && $this->price>999999) {
            $newPrice = $this->getPrice();
            $newPrice /= 1000000;
            return "Продам $this->rooms-комнатную квартиру за $newPrice млн. тг <br>";
        }
    }
}
