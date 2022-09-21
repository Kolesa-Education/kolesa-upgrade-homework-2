<?php

namespace AppClasses\Advert\Tags;

/**
 * PeriodTag вспомогательные класс для представления тег периода. 
 * обеспечивает эластичность изменения периодичности в заголовки объявлений.
 */
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
