<?php

namespace AppClasses\Advert\Tags;

class PeriodTag
{
    private string $period;
    public function __construct(string $period)
    {
        $this->period = $period;
    }

    public function getPeriodTagMsg(): string
    {
        if ($this->period == "month") {
            return  " в месяц";
        } else if ($this->period == "day") {
            return  " в сутки";
        }
    }
}
