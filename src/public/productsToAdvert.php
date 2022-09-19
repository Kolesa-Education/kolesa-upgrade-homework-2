<?php

interface ObjectToAdvert
{
    function getProportyMsg();
}


class Residency
{
    protected $rooms;
}

class Home extends Residency implements ObjectToAdvert
{

    public function __construct($givenRoom)
    {
        $this->rooms = $givenRoom;
    }

    public function getProportyMsg()
    {
        return (string)$this->rooms . "-комнатный дом";
    }
}

class Appartment extends Residency implements ObjectToAdvert

{

    public function __construct($givenRoom)
    {
        $this->rooms = $givenRoom;
    }

    public function getProportyMsg()
    {
        return (string)$this->rooms . "-комнатную квартиру";
    }
}
