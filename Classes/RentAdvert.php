<?php

class RentAdvert extends AbstractAdvert implements InterfaceAdvert
{
    private string $period;

    //При создании подстраивает заголовок объявления под его тип
    public function __construct(int $id, string $category, int $price, string $type, int $rooms, string $period)
    {
        parent::__construct($id, $category, $price, $type, $rooms);
        $this->period = $period;

        switch ($period){
            case "day":
                $this->setTitle($this->getTitle() . " в день");
                break;
            case "month":
                $this->setTitle($this->getTitle() . " в месяц");
                break;
            case "year":
                $this->setTitle($this->getTitle() . " в год");
            default:$this->setTitle($period);

        }
    }


    //ДАЛЬШЕ ИДУТ GETTER-ы и SETTER-ы, ничего интересного

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
    }

}