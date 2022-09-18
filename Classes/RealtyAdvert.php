<?php

declare(strict_types=1);

class RealtyAdvert extends AbstractAdvert
{
    private int $rooms;

    public function __construct(int $id,
                                array $advertData)
    {
        $this->setRooms($advertData["rooms"]);
        parent::__construct($id, $advertData);
    }

    //Генерирует заголовок объявления
    protected function generateTitle() {

        if (!isset($this->price, $this->category, $this->type, $this->rooms)){
            return;
        }

        if ($this->category === "rent"){
                $this->title = "Сдам ";
        } else {
            $this->title = "Продам ";
        }

        if ($this->type === "kvartira"){
            $this->title .= $this->rooms . "-комнатную квартиру за ";
        } else {
            $this->title .= $this->rooms . "-комнатный дом за ";
        }

        if ($this->price > 1000000000){
            $this->title .= $this->price/100000000 . " мрд. тг";
        } elseif ($this->price > 1000000){
            $this->title .= $this->price/1000000 . " млн. тг";
        } else {
            $this->title .= $this->price . " тг";
        }

        if ($this->category === "rent" && isset($this->period)) {
            switch ($this->period) {
                case "day":
                    $this->title .= " в день";
                    break;
                case "month":
                    $this->title .= " в месяц";
                    break;
                case "year":
                    $this->title .= " в год";
            }
        }
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
        $this->generateTitle();
    }

}