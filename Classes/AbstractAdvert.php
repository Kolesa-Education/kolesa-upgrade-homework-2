<?php

declare(strict_types=1);

require_once("InterfaceAdvert.php");

abstract class AbstractAdvert implements InterfaceAdvert
{

private int $id;
protected string $type;
protected int $price;
protected string $category;
protected string $period;
protected string $title = "";

    //Инициализирует переменные при создании
    /**
     * @param array $advertData
     * @param int $id
     */
    public function __construct(int $id, array $advertData) {
        $this->id = $id;
        $this->setType($advertData["type"]);
        $this->setPrice($advertData["price"]);
        $this->setCategory($advertData["category"]);
        if (isset($advertData["period"])){
            $this->setPeriod($advertData["period"]);
        }
    }

    protected function generateTitle() {
        //Переопределяется в дочерних классах
    }


    //ДАЛЬШЕ ИДУТ GETTER-ы и SETTER-ы, ничего интересного. В сеттерах запускается функция generateTitle()

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
        $this->generateTitle();
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
        $this->generateTitle();
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
        $this->generateTitle();
    }

    /**
     * @return string
     */
    public function getPeriod(): string
    {
        return $this->period;
    }

    /**
     * @param string $period
     */
    public function setPeriod(string $period): void
    {
        $this->period = $period;
        $this->generateTitle();
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        if ($this->title == ""){
            $this->generateTitle();
        }
        return $this->title;
    }
}