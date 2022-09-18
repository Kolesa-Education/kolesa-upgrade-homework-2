<?php
interface InterfaceAdvert {
    function getId(): int;
    function getType(): string;
    function setType(string $type): void;
    function getPrice(): int;
    function setPrice(int $price): void;
    function getTitle(): string;
}