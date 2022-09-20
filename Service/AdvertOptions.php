<?php

interface AdvertOptions
{
    public function getTitle();
    public function translatePeriod($period);
    public function changePrice($price);
}