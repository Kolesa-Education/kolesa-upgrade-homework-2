<?php
require_once ("Advert.php");

class FlatAdvert extends Advert 
{
    
    public function getType():string
    {
        return '-комнатную квартиру за ';
    }
    
}