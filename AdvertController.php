<?php

require_once("Classes/AbstractAdvert.php");
require_once("Classes/RealtyAdvert.php");
require_once("Classes/TransportAdvert.php");

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
        //Создает объявление по категории
        switch ($advertData["type"]){
            case ("dom"):
                $advert = new RealtyAdvert(self::$advertsCreatedCount, $advertData);
                break;
            case ("kvartira"):
                $advert = new RealtyAdvert(self::$advertsCreatedCount, $advertData);
                break;
            case "car":
                $advert = new TransportAdvert(self::$advertsCreatedCount, $advertData);
                break;
            }

        //Добавляет объявление в массив всех объявлений
        array_push($this->adverts, $advert);
        //Увеличивает счетчик созданных объявлений
        self::$advertsCreatedCount++;
    }

    //Удаляет объявление по $id
    public function deleteAdvert($id): string
    {
        if (isset($this->adverts[$id])){
            unset($this->adverts[$id]);
            return "Объявление с ID " . $id . " удалено";
        } else {
            return "Объявление с ID " . $id . " не существует";
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

    /**
     * @return AbstractAdvert
     */
    public function getAdvertById(int $id){
        return $this->adverts[$id];
    }


}