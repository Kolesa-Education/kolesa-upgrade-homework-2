<?php

class Advert{
    // attributes/variables of the class
    private int $rooms;
    private string $category;
    private float $price;
    private string $type;
    private string $period;

    public function __construct($rooms, $category,$price, $type, $period){
        //setting default values to the variables of the class
        $this->rooms = $rooms;
        $this->category = $category;
        $this->price = $price;
        $this->type = $type;
        $this->period = $period;
    }

    function setRoom($rooms){
        $this->rooms = $rooms;
    }

    function getrooms(){
        return $this->rooms;
    }

    function setCategory($category){
        $this->category = $category;
    }

    function getCategory(){
        return $this->category;
    }

    function setPrice($price){
        $this->price = $price;        
    }

    function getPrice(){
        if($this->price >= 1000000 ){
            $this->price = $this->price/1000000;
            return $this->price." млн.";
        }else{
            return $this->price;
        }   
    }
        
    function setType($type){
        $this->type = $type;        
    }

    function getType(){
        return $this->type;
    }

    function setPeriod($period){
        $this->period = $period;
    }

    function getPeriod(){
        return $this->period;
    }

    function getTitle(){
        if($this->getCategory()==='sale'){
            echo "- Продам ";
        }else if($this->getCategory()==='rent'){
            echo "- Сдам ";
        }

        if($this->getType()==='dom'){
            echo $this->getRooms()."-комнатный дом за ".$this->getPrice()." тг";
        }else if($this->getType()==='kvartira'){
            echo $this->getRooms()."-комнатную квартиру за ".$this->getPrice()." тг";
        }

        if($this->getPeriod() === 'month'){
            echo " в месяц".".<br>";;
        }else if($this->getPeriod() === 'day'){
            echo " в сутки".".<br>";;
        }else{
            echo "  ".".<br>";
        }
    }
}

// above is the logic
// ======================================Main======================================
// below is implementation

//objects, when I use "new" i am making objects  using Advert class
// $adverts1 = new Advert(5, "sale", 55000000, "dom", "");
// $adverts2 = new Advert(2, "sale", 21500000, "kvartira", "");
// $adverts3 = new Advert(2, "rent", 200000, "kvartira", "month");
// $adverts4 = new Advert(1, "rent", 15000, "kvartira", "day");

// $adverts1->getTitle();
// $adverts2->getTitle();
// $adverts3->getTitle();
// $adverts4->getTitle();

// ----------------------------------------------------------------------------------------------------------
$adverts = [
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira','period'=>'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period'=>'day'], 
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira','period'=>'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period'=>'day'],
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira','period'=>'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period'=>'day'],
    ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
    ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
    ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira','period'=>'month'],
    ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period'=>'day'],
];

$objects = []; 
$values = [];

// Extracting Data from List
foreach($adverts as $ad){
// Parse the List to get dictionaries 

    foreach($ad as $name => $value) {
    // Parse Dictionaries to get Values 
    	$values[] = $value;       
    }
    
    // Creating Objects
    // If else only for if period exists 
    if(count($values)<5){
    $ad_obj = new Advert($values[0], $values[1], $values[2], $values[3],"");
    }else{
    $ad_obj = new Advert($values[0], $values[1], $values[2], $values[3], $values[4]);
    }
    
    // Stores object in Array of objects
    $objects[] = $ad_obj;
    // Clears values for new values of the new ad dictionary 
    $values = [];
}

// get Title for each array of object 
foreach($objects as $obj){
    $obj->getTitle();
}