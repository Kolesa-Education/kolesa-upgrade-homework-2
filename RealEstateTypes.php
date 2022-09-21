<?php

interface printable
{
    public static function getPrintableString(string $estateType);
}

class RealEstateTypes implements printable
{

    private static $instances = [];

    protected function __construct()
    {
    }

    protected function __clone()
    {
    }

    public function __wakeup()
    {
    }

    public static function getInstance(): RealEstateTypes
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }

    const REAL_ESTATE_TYPES = array(
        'dom' => '-комнатный дом',
        'kvartira' => '-комнатную квартиру',
    );

    public static function checkEstateType(string $estateType): bool
    {
        if (!array_key_exists($estateType, self::REAL_ESTATE_TYPES))
            throw new Exception('ESTATE TYPE: ' . $estateType . "DOESN'T EXIST");
        return true;
    }

    public static function getPrintableString(string $estateType): string
    {
        try {
            self::checkEstateType($estateType);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return self::REAL_ESTATE_TYPES[$estateType];
    }
}
