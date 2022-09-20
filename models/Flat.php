<?php
declare(strict_types=1);

class Flat extends Advert {

    protected string $type;
    protected string $period;


    public function __construct(int $rooms,string $category,int $price,string $type,string $period)
    {
        parent::__construct($rooms,$category,$price);
        $this->type = $type;
        $this->period = $period;
    }


    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @param mixed $period
     */
    public function setPeriod($period): void
    {
        $this->period = $period;
    }

    public function getTitle()
    {
        $newPeriod = $this->getPeriod();


        if ($newPeriod=="month") {
            return "Сдам $this->rooms-комнатную квартиру за $this->price  тг в месяц <br>";
        } else {
            return "Сдам $this->rooms-комнатную квартиру за $this->price  тг в сутки <br>";
        }
    }
}