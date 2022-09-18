<?php
#Я думал сделать разбиение классов по типу жилья(дом/квартира) или по категории(аренда/полная продажа)
#Решил остановиться на первом варианте, т.к. данный вариант показался мне более реалистичным и логичным
#Если всё таки лучше будет выбрать вариант 2, то готов переделать)

abstract class Advert
#абстрактный класс, в котором объявил все поля; конструктор, который наследуют 2 дочерних класса; геттеры и сеттеры;
# + метод по выбору дня через switch/case
{
    protected $rooms;        #кол-во комнат
    protected $category;     #категория на продажу или аренду
    protected $price;        #Цена
    protected $type;         #Тип жилья (Квартира/Дом)
    protected $period;       #Период в случае если это аренда

    function __construct(...$args) {
        #Конструктор, где помимо присвоения, я обрабатываю отсутствие периода, если происходит покупка а не аренда
        $this->rooms = $args[0];
        $this->category = $args[1];
        $this->price = $args[2];
        $this->type = $args[3];
        if(isset($args[4])){
        $this->period =  $args[4];
        }
    }
    
   #геттеры и сеттеры, лишним не будет
   public function getRooms(){
    return $this->rooms;
   }

   public function setRooms($rooms){
    return $this->rooms = $rooms;
   }

   public function getCategory(){
    return $this->category;
   }

   public function setCategory($category){
    return $this->category = $category;
   }
   public function getPrice(){
    return $this->price;
   }

   public function setPrice($price){
    return $this->price = $price;
   }
   public function getType(){
    return $this->type;
   }

   public function setType($type){
    return $this->type = $type;
   }
   public function getPeriod(){
    return $this->period;
   }

   public function setPeriod($period){
    return $this->period = $period;
   }
   
   #абстрактный метод, который реализуем в дочерних классах
    abstract function getTitle();


    #Доп. функционал по подстановке слова, если геттеров и сеттеров не хватит))
    function countPeriodWord(){
        switch ($this->period){
            case "month":
                $period_word = "месяц";
                break;
            case "day":
                $period_word = "день";
                break;
            case "year":
                $period_word = "год";
                break;
            case "week":
                $period_word = "неделю";
                break;
        }

        return $period_word;
    }

}
class flatAdvert extends Advert{
 #Класс оъявлений для квартиры, включает в себя и покупку, и аренду   
    function __construct(...$args) {
        parent::__construct(...$args);   
   }
    
    function getTitle(){
        #Реализация вывода объявления, условие для полной покупки, или аренды
        if ($this->category == 'sale') {
            echo "Продам $this->rooms-комнатную квартиру за $this->price тенге" . PHP_EOL;
        } elseif ($this->category == "rent"){
            echo "Сдам $this->rooms-комнатную квартиру за $this->price тенге в " .$this->countPeriodWord() . PHP_EOL;
        }
    }
}

class houseAdvert extends Advert{
    #Класс объявлений для дома, включает в себя и покупку, и аренду
    function __construct(...$args) {
        parent::__construct(...$args);   
   }
    

    function getTitle(){
        #Реализация вывода объявления, условие для полной покупки, или аренды
        if ($this->category == 'sale') {
            echo "Продам $this->rooms-комный дом за $this->price тенге" . PHP_EOL;
        } elseif ($this->category == "rent"){
            echo "Сдам $this->rooms-комнатный дом за $this->price тенге в " .countPeriodWord() . PHP_EOL;
        }
    }}
    function number_format_short( $num, $okr = 1 ) {
        #Округление чисел (регулярные выражения? не, не слышал)
        if ($num < 900) {
            $n_format = number_format($num, $okr);
            $suffix = '';
        } else if ($num < 900000) {
            $n_format = number_format($num / 1000, $okr);
            $suffix = ' тысяч';
        } else if ($num < 900000000) {
            $n_format = number_format($num / 1000000, $okr);
            if($num >= 1000000 and $num<2000000){
                echo $num;
                $suffix = ' миллион';
            }
            else if ($num >= 2000000){
            $suffix = ' миллионов';
            }
        };
        if ( $okr > 0 ) {
            $dotzero = '.' . str_repeat( '0', $okr );
            $n_format = str_replace( $dotzero, '', $n_format );
        }
        return $n_format . $suffix;
    }

    #Стартовый словарь/ассоциативный массив
    $adverts = [
        ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
        ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
        ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
        ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'week'], #Поменял day на week чтобы протестить новый функционал
    ];

#Проходимся циклом
foreach ($adverts as $innerarr) {
    #В зависимости от значения ключа, вызываем инициализацию соответствующего класса и присвоением полей
    if ($innerarr['type'] == "kvartira"){
        if(isset($innerarr['period'])){
            $FlatOrHouseIDK = new flatAdvert($innerarr['rooms'],$innerarr['category'],number_format_short($innerarr['price']),$innerarr['type'],$innerarr['period']);
      
        }
        else{
            $FlatOrHouseIDK = new flatAdvert($innerarr['rooms'],$innerarr['category'],number_format_short($innerarr['price']),$innerarr['type']);
        }
        }
    elseif ($innerarr['type'] == "dom"){
        if(isset($innerarr['period'])){
            $FlatOrHouseIDK = new houseAdvert($innerarr['rooms'],$innerarr['category'],number_format_short($innerarr['price']),$innerarr['type'],$innerarr['period']);
      
        }
        else{
            $FlatOrHouseIDK = new houseAdvert($innerarr['rooms'],$innerarr['category'],number_format_short($innerarr['price']),$innerarr['type']);
        }};

#Вызываем наш долгожданный метод и радуемся жизни
$FlatOrHouseIDK->getTitle();}

?>