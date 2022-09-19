<?php

include_once './hasTitle.php';

class House implements hasTitle
{
    protected int $rooms = 0;
    protected string $category = "";
    protected int $price = 0;
    protected string $type = "";

    public function __construct(int $rooms, string $category, int $price, string $type)
    {
        $this->rooms = $rooms;
        $this->category = $category;
        $this->price = $price;
        $this->type = $type;
    }

    public function getTitle(): string
    {

        $title = $this->category === "sale" ? "Продам " : "Сдам ";

        $title .= "$this->rooms-";

        $title .= $this->rooms <= 2 ? "комнатную " : "комнатный ";

        $title .= $this->type === "dom" ? "дом " : "квартиру ";

        $title .= "за " . $this->formatPrice($this->price);

        return $title;
    }

    private function formatPrice(int $price): string
    {
        if ($price > 1_000_000) {
            return round($price / 1_000_000, 2) . " млн. тг";
        } else {
            return number_format($price, 0, ".", " ") . " тг";
        }
    }
}
