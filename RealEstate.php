<?php

include("RealEstateTypes.php");

class RealEstate
{

    protected string $estateType;
    protected int $numberOfRooms;

    public function __construct(string $estateType, int $numberOfRooms)
    {

        $this->setEstateType($estateType);
        $this->setNumberOfRooms($numberOfRooms);

    }

    private function setEstateType(string $estateType): void
    {
        try {
            RealEstateTypes::checkEstateType($estateType);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $this->estateType = $estateType;
    }

    private function setNumberOfRooms(int $numberOfRooms): void
    {
        try {
            $this->checkIsPosInt($numberOfRooms);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $this->numberOfRooms = $numberOfRooms;
    }

    protected function checkIsPosInt(int $number): bool
    {
        if (!(is_int($number) and $number > 0))
            throw new Exception('NUMBER: ' . $number . " IS NOT POSITIVE OR INTEGER");
        return true;
    }

    public function getPrintableRealEstate(): string
    {
        return $this->numberOfRooms . RealEstateTypes::getPrintableString($this->estateType);
    }

}
