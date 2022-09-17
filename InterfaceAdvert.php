<?php
interface InterfaceAdvert {
    function getTitle(): string;
    function getCategory(): string;
    function setCategory(string $category): void;
    function getPrice(): int;
    function setPrice(int $price): void;
    function getType(): string;
    function setType(string $type): void;
    function getRooms(): int;
    function setRooms(int $rooms): void;
}