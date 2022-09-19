<?php

interface AdvertsInterface
{
    public function checkPrice();

    public function checkCategory();

    public function checkPeriod();

    public function checkType();

    public function checkRooms();

    public function getTitle();
}
