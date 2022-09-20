<?php
//
//class Adverts implements TitleInterface
//{
//    private $rooms;
//    private $category;
//    private $price;
//    private $type;
//    private $period;
//
//    /**
//     * @param $rooms
//     * @param $category
//     * @param $price
//     * @param $type
//     * @param $period
//     */
//    public function __construct($rooms, $category, $price, $type, $period)
//    {
//        $this->rooms = $rooms;
//        $this->category = $category;
//        $this->price = $price;
//        $this->type = $type;
//        $this->period = $period;
//    }
//
//
//    /**
//     * @return mixed
//     */
//    public function getRooms()
//    {
//        return $this->rooms;
//    }
//
//    /**
//     * @param mixed $rooms
//     */
//    public function setRooms($rooms)
//    {
//        $this->rooms = $rooms;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getCategory()
//    {
//        return $this->category;
//    }
//
//    /**
//     * @param mixed $category
//     */
//    public function setCategory($category)
//    {
//        $this->category = $category;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getPrice()
//    {
//        return $this->price;
//    }
//
//    /**
//     * @param mixed $price
//     */
//    public function setPrice($price)
//    {
//        $this->price = $price;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getType()
//    {
//        return $this->type;
//    }
//
//    /**
//     * @param mixed $type
//     */
//    public function setType($type)
//    {
//        $this->type = $type;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getPeriod()
//    {
//        return $this->period;
//    }
//
//    /**
//     * @param mixed $period
//     */
//    public function setPeriod($period)
//    {
//        $this->period = $period;
//    }
//
//
//    public function getTitle()
//    {
//        if ($this->getPrice() > 1000000) {
//            $this->setPrice($this->getPrice() / 1000000);
//            return "Продам $this->rooms - комнатной дом за $this->price млн тг. <br>";
//        }
//
//        if ($this->getPeriod() == "month") {
//            return "Сдам $this->rooms-комнатную квартиру за $this->price тг в месяц. <br>";
//        } elseif ($this->getPeriod() == "day") {
//            return "Сдам $this->rooms-комнатную квартиру за $this->price тг в день. <br>";
//        }
//    }
//
//
//}
//
//
//interface TitleInterface
//{
//
//    public function getTitle();
//}