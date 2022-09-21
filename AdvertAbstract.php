<?php

abstract class AdvertAbstract
{

    protected abstract function formatCategory();

    protected abstract function formatPeriod();

    protected abstract function formatType();

    protected abstract function formatRooms();

    public abstract function getTitle();

}