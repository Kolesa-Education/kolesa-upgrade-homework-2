<?php
require_once("InterfaceAdvert.php");

abstract class AbstractAdvert implements InterfaceAdvert
{

private int $id;
private string $category;
private int $price;
private string $type;
private int $rooms;
protected string $title = "";

//Инициализирует переменные при создании
    function __construct(int $id, string $category, int $price, string $type, int $rooms) {
        $this->id = $id;
        $this->setCategory($category);
        $this->setPrice($price);
        $this->setType($type);
        $this->setRooms($rooms);
        $this->generateTitle();
    }

    //Генерирует заголовок
    public function generateTitle() {
        if ($this->category == "sale"){
            $this->title = "Продам ";
        } else {
            $this->title = "Сдам ";
        }

        if ($this->type == "kvartira"){
            $this->title .= $this->rooms . "-комнатную квартиру за ";
        } else {
            $this->title .= $this->rooms . "-комнатный дом за ";
        }

        switch (true) {
            case $this->price > 999999 && $this->price < 100000000:
                $this->title .= $this->price/1000000 . " млн. тг ";
                break;
            case $this->price > 100000000:
                $this->title .= $this->price/100000000 . " мрд. тг ";
                break;
            default:
                $this->title .= $this->price . " тг";
        }
    }


    //ДАЛЬШЕ ИДУТ GETTER-ы и SETTER-ы, ничего интересного

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getRooms(): int
    {
        return $this->rooms;
    }

    /**
     * @param int $rooms
     */
    public function setRooms(int $rooms): void
    {
        $this->rooms = $rooms;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    protected function setTitle(string $title): void
    {
        $this->title = $title;
    }


}