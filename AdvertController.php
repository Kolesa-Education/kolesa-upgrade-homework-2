<?php

require_once("Classes/AbstractAdvert.php");
require_once("Classes/RentAdvert.php");
require_once ("Classes/SellAdvert.php");

class AdvertController //Singleton
{
    //Хранит экземпляр самого себя
    private static $instance = null;

    //Количество созданных объявлений, по совместительству генератор ID
    private static $advertsCreatedCount = 0;

    //Хранит все созданные объявления
    private array $adverts = [];

    //Ограничивает создание нового объекта
    private function __construct() {

    }

    //Ограничивает клонирование объекта
    private function __clone() {

    }

    //Возвращает имеющийся экземпляр класса или создает новый, если такого не существует
    public static function getInstance (){
        if (is_null(self::$instance)){
            self::$instance = new self();
        }
        return self::$instance;
    }

    //Создает объявление
    /**
     * @param array $advertData
     */
    public function createAdvert(array $advertData){
        //Увеличивает счетчик созданных объявлений
        self::$advertsCreatedCount++;
        //Создает объявление по категории
            switch ($advertData["category"]){
                case "sale":
                    $advert = new SellAdvert(self::$advertsCreatedCount, $advertData["category"], $advertData["price"], $advertData["type"], $advertData["rooms"]);
                    break;
                case "rent":
                    $advert = new RentAdvert(self::$advertsCreatedCount, $advertData["category"], $advertData["price"], $advertData["type"], $advertData["rooms"], $advertData["period"]);
                    break;
            }
            //Добавляет объявление в массив всех объявлений
            array_push($this->adverts, $advert);
    }

    //Удаляет объявление
    public function deleteAdvert($id): string
    {
        $id--;
        if (isset($this->adverts[$id])){
            unset($this->adverts[$id]);
            return "Объявление с ID " . $id . " удалено";
        } else {
            return "Объявление с ключом " . $id . " не существует";
        }
    }

    //Возвращает количество созданных объявлений
    /**
     * @return int
     */
    public static function getAdvertsCreatedCount(): int
    {
        return self::$advertsCreatedCount;
    }

    //Возвращает массив объявлений
    /**
     * @return array
     */
    public function getAdverts(): array
    {
        return $this->adverts;
    }



}