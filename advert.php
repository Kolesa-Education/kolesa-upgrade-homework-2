<?php


class Advert {
    private $rooms;
    private $category;
    private $price;
    private $type;
    private $period;
    

    public function construct_array(array $arr = NULL) {
        $this->rooms    = $arr['rooms'];
        $this->category = $arr['category'];
        $this->price    = $arr['price'];
        $this->type     = $arr['type'];
        $this->period   = (array_key_exists('period', $arr) ? $arr['period'] : NULL);
    }
      

    public function construct_arguments(int $rooms=NULL, string $category=NULL, int $price=NULL,  string $type=NULL, string $period = NULL) {
        $this->rooms    = $rooms;
        $this->category = $category;
        $this->price    = $price;
        $this->type     = $type;
        $this->period   = $period;
    }


    public function __construct() {
        $arguments = func_get_args();
        $arg_num = func_num_args();
        
        if ($arg_num == 1) {
            call_user_func_array(array($this, 'construct_array'), $arguments);
        }
        else if ($arg_num > 1) {
            call_user_func_array(array($this, 'construct_arguments'), $arguments);
        }
    }


    public function get_period_text() : string {
        $period_texts = ['month' => 'месяц', 'day' => 'сутки', 'hour' => 'час', 'quarter' => 'квартал'];
        return ' в ' . $period_texts["{$this->period}"];
    }


    public function get_price_text() : string {
        $price = $this->price;
        
        if ($price>1000000000000) { $res_price = $price/1000000000000 . ' трлн.'; }
        if ($price>1000000000)    { $res_price = $price/1000000000 . ' млрд.'; }
        if ($price>1000000)       { $res_price = $price/1000000 . ' млн.'; }
        else                      { $res_price = number_format($price, 0, '', ' '); }

        return $res_price;            
    }


    public function __toString() {
        $txt_category = ($this->category == 'sale' ? 'Продам' : 'Сдам'); 
        $txt_type     = ($this->type == 'dom' ? 'ый дом' : 'ую квартиру'); 
        $txt_price    = ($this->get_price_text());
        $txt_period   = (isset($this->period) ? $this->get_period_text() : '');

        return "{$txt_category} {$this->rooms}-комнатн{$txt_type} за {$txt_price} тг{$txt_period}" . PHP_EOL;
    }


    public function getTitle() {
        return $this->__toString();
    }

}

?>