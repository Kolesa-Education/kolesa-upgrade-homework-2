<?php 

abstract class Advert {
    protected int $rooms;
    protected string $category;
    protected int $price;
    protected string $type;

    public function getTitle(): string { }

    public function getPrice() {
        return ($this->price > 1000000) ? ($this->price / 1000000 . " млн.") : ($this->price);
    }

    public function getType() {
        return ($this->type == "dom") ? "-комнатный дом" : "-комнатную квартиру";
    }
}