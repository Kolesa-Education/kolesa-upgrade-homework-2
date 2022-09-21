<?php

interface AdvertInterface
{
    function getRooms(): int;
    function getCategory(): string;
    function getPrice(): int;
    function getType(): string;
}