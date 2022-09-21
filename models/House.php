<?php
declare(strict_types=1);

class House extends Advert
{
   public function __construct(int $rooms, int $price, string $type)
   {
       parent::__construct( $rooms,  $price, $type);
   }

    public function getTitle()
    {
            $newPrice = $this->getPrice();
            $newPrice /= 1000000;
            return "Продам $this->rooms-комнатный дом за $newPrice млн. тг <br>";

    }
}
