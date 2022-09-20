<?php

abstract class AdvertsInterface
{

    protected abstract function checkCategory();

    protected abstract function checkPeriod();

    protected abstract function checkType();

    protected abstract function checkRooms();

    public abstract function getTitle();

}