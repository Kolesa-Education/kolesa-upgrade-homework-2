<?php
#Я думал сделать разбиение классов по типу жилья(дом/квартира) или по категории(аренда/полная продажа)
#Решил остановиться на первом варианте, т.к. данный вариант показался мне более реалистичным и логичным
#Если всё таки лучше будет выбрать вариант 2, то готов переделать)
error_reporting(E_ERROR | E_PARSE); #Вырубаю варнинги (Главный косяк варианта через типы жилья)

abstract class Advert
#абстрактный класс, в котором объявил все поля; конструктор, который наследуют 2 дочерних класса; геттеры и сеттеры;
# + метод по выбору дня через switch/case
{
    protected int $rooms;           #кол-во комнат
    protected string $category;     #категория на продажу или аренду
    protected int $price;           #Цена
    protected string $type;         #Тип жилья (Квартира/Дом)
    protected string $period;       #Период в случае если это аренда

    function __construct(int $rooms, string $category, int $price, string $type,$period=false) {
        #Конструктор, где помимо присвоения, я обрабатываю отсутствие периода, если происходит покупка а не аренда
        $this->rooms = $rooms;
        $this->category = $category;
        $this->price = $price;
        $this->type = $type;
        if (!is_null($period)){
            $this->period = $period;
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
    function __construct(int $rooms, string $category, int $price, string $type,$period) {
        parent::__construct($rooms,$category,$price,$type,$period);   
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
    function __construct(int $rooms, string $category, int $price, string $type,$period) {
        parent::__construct($rooms,$category,$price,$type,$period);   
   }
    

    function getTitle(){
        #Реализация вывода объявления, условие для полной покупки, или аренды
        if ($this->category == 'sale') {
            echo "Продам $this->rooms-комный дом за $this->price тенге" . PHP_EOL;
        } elseif ($this->category == "rent"){
            echo "Сдам $this->rooms-комнатный дом за $this->price тенге в " .countPeriodWord() . PHP_EOL;
        }
    }}


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
        $FlatOrHouseIDK = new flatAdvert($innerarr['rooms'],$innerarr['category'],$innerarr['price'],$innerarr['type'],$innerarr['period']);
    }
    elseif ($innerarr['type'] == "dom"){
        $FlatOrHouseIDK = new houseAdvert($innerarr['rooms'],$innerarr['category'],$innerarr['price'],$innerarr['type'],$innerarr['period']);
    };

#Вызываем наш долгожданный метод и радуемся жизни
$FlatOrHouseIDK->getTitle();}

?>