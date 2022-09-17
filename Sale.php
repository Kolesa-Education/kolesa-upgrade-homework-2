<?php

namespace Advert;

include_once 'Category.php';

class Sale extends Category
{
    public function __construct()
    {
        parent::__construct('sale');
    }
}