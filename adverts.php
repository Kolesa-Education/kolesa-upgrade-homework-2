<?php
abstract class Adverts{

    protected int $rooms;
    protected string $category;
    protected int $price;
    protected string $type;
    protected string $period;

    protected function changePriceToString(){
        if ($this->price < 1000000){
            return $this->price . "тг";
        }
        $buf = $this->price;
        echo $buf . $buf . PHP_EOL;
        $zero = true;
        $result="";
        for($counter=0; $buf>0; $counter++){
            if ($counter<6){
                if ($buf%10!=0){
                    $zero = false;
                }
                if (!$zero){
                    $result = $buf%10 . $result;
                }
                $buf = ($buf - $buf%10)/10;
                continue;
            }
            if ($counter==6 && $result!=""){
                $result = $buf%10 . "," . $result;
                $buf = ($buf - $buf%10)/10;
                continue;
            }
            $result = $buf%10 . $result;
            $buf = ($buf - $buf%10)/10;
        }
        return $result;
    }

    abstract function getTitle();
}

class Sale extends Adverts{
    public function getTitle(){ 

    }
}
$mam = new Sale();



?>
