<?php
require_once ("Advert.php");

class HouseAdvert extends Advert
{
    
    public function getType():string
    {
        return '-комнатный дом за ';
    }
    
}