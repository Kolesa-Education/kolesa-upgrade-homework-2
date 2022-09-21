<?php

class Advert {
   public $rooms ;
   public $category;
   public $price;
   public $type;
   public $period;

    public function __construct( ...$fields
    )
    {
        $this->rooms= $fields[0];
        $this->category= $fields[1];
        $this->price=$fields[2];
        $this->type=$fields[3];
        $this->period=$fields[4];
     
    }


 public function getTitle (){
    $str="-";
        if ($this->category=="sale") { $str.= "Продам";}
            else {$str.= "Сдам";}
        $str.=" ".strval($this->rooms)."-";
        if ($this->type=="dom"  ) { $str.= "комнатный дом ";}
            else {$str.= "комнатную квартиру ";}
        if ($this->price /1000000>=1 ) {$str.=strval($this->price/1000000)." млн.тг ";}
            else {$str.=$this->price." тг ";}
       if ($this->period =="month") {$str.="за месяц";}
        else if ($this->period=="day") {$str.="за день";}       
        return $str;
 }
}
$advert=new Advert (5,'sale', 55000000,'dom');
$advert1=new Advert (2,'sale', 21500000,'kvartira');
$advert2=new Advert (2,'rent', 200000,'kvartira','month');
$advert3=new Advert (1,'rent', 15000,'kvartira','day');
$adverts = array($advert,$advert1,$advert2,$advert3);
 for ($i = 0; $i < count($adverts); $i++) {
echo $adverts[$i]->getTitle() . PHP_EOL;
 }