<?php

class Advert 
{
    private $rooms;
    private $category;
    private $price;
    private $type;
    private $period;

    public function __construct(int $rooms, string $category, int $price,  string $type, string $period = NULL) 
    {
        $this->rooms    = $rooms;
        $this->category = $category;
        $this->price    = $price;
        $this->type     = $type;
        $this->period   = $period;
    }

    public function getCategoryText() : string 
    {
        return ($this->category == 'sale' ? 'Продам' : 'Сдам');
    }

    public function getTypeText() : string 
    {
        return ($this->type == 'dom' ? 'ый дом' : 'ую квартиру');
    }
    
    public function getPeriodText() : string 
    {
        $period_texts = ['month' => 'месяц', 'day' => 'сутки', 'hour' => 'час', 'quarter' => 'квартал'];
        if (isset($this->period)) {
            return 'в ' . $period_texts["{$this->period}"];
        }
        return '';
    }

    public function getPriceText() : string 
    {
        $price = $this->price;

        if ($price>1000000000000) {
            $res_price = $price/1000000000000 . ' трлн.'; 
        } elseif ($price>1000000000) {
            $res_price = $price/1000000000 . ' млрд.'; 
        } elseif ($price>1000000) {
            $res_price = $price/1000000 . ' млн.';
        } else {
            $res_price = number_format($price, 0, '', ' ');
        }

        return $res_price;
    }

    public function getTitle() 
    {
        // $txt_category = ($this->category == 'sale' ? 'Продам' : 'Сдам'); 
        // $txt_type     = ($this->type == 'dom' ? 'ый дом' : 'ую квартиру'); 
        // $txt_price    = ($this->getPriceText());
        // $txt_period   = (isset($this->period) ? $this->getPeriodText() : '');
        
        $res_text = "{$this->getCategoryText()} "
                  . "{$this->rooms}-комнатн{$this->getTypeText()} за "
                  . "{$this->getPriceText()} тг {$this->getPeriodText()}" . PHP_EOL;
        return $res_text;
    }
}
?>