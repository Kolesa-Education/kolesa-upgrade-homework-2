<?php
/*
Я думал сделать разбиение классов по типу жилья(дом/квартира) или по категории(аренда/полная продажа)
Решил остановиться на первом варианте, т.к. данный вариант показался мне более реалистичным и логичным
Если всё таки лучше будет выбрать вариант 2, то готов переделать)
*/

/** 
* Абстрактный класс, в котором объявил все поля; конструктор, который наследуют 2 дочерних класса; геттеры и сеттеры;
* +метод по выбору дня через switch/case
**/
abstract class Advert

{
    protected int    $rooms;     //Кол-во комнат
    protected string $category;  //Категория на продажу или аренду
    protected string $price;     //Цена
    protected string $type;      //Тип жилья (Квартира/Дом)
    protected string $period;    //Период в случае если это аренда

    public function __construct($args) 
    {
        //Конструктор, где помимо присвоения, я обрабатываю отсутствие периода, если происходит покупка а не аренда
        $this->rooms = $args['rooms'];
        $this->category = $args['category'];
        $this->price = $args['price'];
        $this->type = $args['type'];
        if(isset($args['period']))
        {
        $this->period =  $args['period'];
        }
    }
    
   //геттеры и сеттеры, лишним не будет
   public function getRooms(): int
   {
    return $this->rooms;
   }

   public function setRooms($rooms): int
   {
    return $this->rooms = $rooms;
   }

   public function getCategory(): string
   {
    return $this->category;
   }

   public function setCategory($category): string
   {
    return $this->category = $category;
   }
   public function getPrice(): int
   {
    return $this->price;
   }

   public function setPrice($price): int
   {
    return $this->price = $price;
   }

   public function getType(): string
   {
    return $this->type;
   }

   public function setType($type): string
   {
    return $this->type = $type;
   }
   public function getPeriod(): string
   {
    return $this->period;
   }

   public function setPeriod($period): string
   {
    return $this->period = $period;
   }
   
   //Абстрактный метод, который реализуем в дочерних классах
    abstract function getTitle();


    //Доп. функционал по подстановке слова, если геттеров и сеттеров не хватит))
    function countPeriodWord(): string
    {
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
class FlatAdvert extends Advert{
 //Класс оъявлений для квартиры, включает в себя и покупку, и аренду   
   
    function getTitle()
    {
        //Реализация вывода объявления, условие для полной покупки, или аренды
        if ($this->category == 'sale') {
            echo "Продам $this->rooms-комнатную квартиру за $this->price тенге" . PHP_EOL;
        } elseif ($this->category == "rent"){
            echo "Сдам $this->rooms-комнатную квартиру за $this->price тенге в " .$this->countPeriodWord() . PHP_EOL;
        }
    }
}

class HouseAdvert extends Advert{
    //Класс объявлений для дома, включает в себя и покупку, и аренду    

    function getTitle()
    {
        //Реализация вывода объявления, условие для полной покупки, или аренды
        if ($this->category == 'sale') {
            echo "Продам $this->rooms-комный дом за $this->price тенге" . PHP_EOL;
        } elseif ($this->category == "rent"){
            echo "Сдам $this->rooms-комнатный дом за $this->price тенге в " .countPeriodWord() . PHP_EOL;
        }
    }}
    function number_format_short( $num, $okr = 1 ): string
    {
        //Округление чисел (регулярные выражения? не, не слышал)
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

    //Стартовый словарь/ассоциативный массив
    $adverts = [
        ['rooms' => 5, 'category' => 'sale', 'price' => 55000000, 'type' => 'dom'],
        ['rooms' => 2, 'category' => 'sale', 'price' => 21500000, 'type' => 'kvartira'],
        ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'kvartira', 'period' => 'month'],
        ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'kvartira', 'period' => 'week'], //Поменял day на week чтобы протестить новый функционал
    ];

//Проходимся циклом
foreach ($adverts as $innerarr) {
    //В зависимости от значения ключа, вызываем инициализацию соответствующего класса и присвоением полей
    if ($innerarr['type'] == "kvartira"){
        if(isset($innerarr['period'])){
            $flatOrHouseIDK = new FlatAdvert($innerarr);
      
        }
        else{
            $flatOrHouseIDK = new FlatAdvert($innerarr);
        }
        }
    elseif ($innerarr['type'] == "dom"){
        if(isset($innerarr['period'])){
            $flatOrHouseIDK = new HouseAdvert($innerarr);
      
        }
        else{
            $flatOrHouseIDK = new HouseAdvert($innerarr);
        }};

//Вызываем наш долгожданный метод и радуемся жизни
    $flatOrHouseIDK->getTitle();
}

?>