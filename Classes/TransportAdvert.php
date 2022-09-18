<?php

declare(strict_types=1);

class TransportAdvert extends AbstractAdvert
{
    private int $mileage;
    private int $yearOfIssue;
    private string $model;

    public function __construct(int $id,
                                array $advertData)
    {
        $this->setMileage($advertData["mileage"]);
        $this->setYearOfIssue($advertData["yearOfIssue"]);
        $this->setModel($advertData["model"]);
        parent::__construct($id, $advertData);
    }

    //Генерирует заголовок
    protected function generateTitle() {

        if (!isset($this->price, $this->category, $this->model, $this->yearOfIssue)) {
            return;
        }

        if ($this->category === "leasing"){
            $this->title = "Лизинг ";
        } else {
            $this->title = "Продам ";
        }

        $this->title .= $this->model . " " . $this->yearOfIssue . " года, с пробегом " . $this->mileage . "км, за ";

        if ($this->price > 1000000000){
            $this->title .= $this->price/100000000 . " мрд. тг";
        } elseif ($this->price > 1000000){
            $this->title .= $this->price/1000000 . " млн. тг";
        } else {
            $this->title .= $this->price . " тг";
        }

        if ($this->category === "leasing" && isset($this->period)) {
            switch ($this->period) {
                case "month":
                    $this->title .= " в месяц";
                    break;
                case "year":
                    $this->title .= " в год";
                    break;
            }
        }
    }

    /**
     * @return int
     */
    public function getMileage(): int
    {
        return $this->mileage;
    }

    /**
     * @param int $mileage
     */
    public function setMileage(int $mileage): void
    {
        $this->mileage = $mileage;
        $this->generateTitle();
    }

    /**
     * @return int
     */
    public function getYearOfIssue(): int
    {
        return $this->yearOfIssue;
    }

    /**
     * @param int $yearOfIssue
     */
    public function setYearOfIssue(int $yearOfIssue): void
    {
        $this->yearOfIssue = $yearOfIssue;
        $this->generateTitle();
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
        $this->generateTitle();
    }
}