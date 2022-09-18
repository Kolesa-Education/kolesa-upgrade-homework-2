<?php

interface RealEstateAdvertInterface
{
    public function getTitle(): string;

    public function getRooms(): int;

    public function setRooms(int $rooms): void;

    public function getCategory(): string;

    public function setCategory(string $category): void;

    public function getPrice(): int;

    public function setPrice(int $price): void;

    public function getType(): string;

    public function setType(string $type): void;
}