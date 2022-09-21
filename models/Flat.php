<?php
declare(strict_types=1);

class Flat extends Advert {

    protected string $period;

    /**
     * @param $period
     */
    public function __construct(int $rooms, int $price,string $type,string $period)
    {
        parent::__construct($rooms,$price,$type);
        $this->period = $period;
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