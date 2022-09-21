<?php

    require_once("IAdvert.php");

    abstract class EstateAdvert implements IAdvert{


      protected float $m_price;
      protected int $m_roomCount;
      protected string $m_houseType;

      public function __construct(float $price, int $roomCount, string $houseType,string $category){
        $this->setPrice($price);
        $this->setRoomCount($roomCount);
        $this->setHouseType($houseType);
        $this->setCategory($category);
      }


      public function getPrice():float {
          return $this->m_price;
      }
      public function setPrice(float $price) {
          $this->m_price =$price;
      }
      public function getFormatedPrice():string{
        $price = round($this->getPrice()/1000000,2);
        if($price>=1){
          return "$price млн.";
        }
        return $this->getPrice();

      }

      public function getHouseType() : string{
        return $this->m_houseType;
      }
      public function setHouseType(string $houseType) {
        $this->m_houseType = $houseType;
      }

      public function getRoomCount() : int{
        return $this->m_roomCount;
      }
      public function setRoomCount(int $roomCount) {
        $this->m_roomCount = $roomCount;
      }


      abstract public function getCategory():string;
      abstract public function setCategory(string $category);

      public function getTitle() :string{
        return "Реклама Недвижимости (".$this->getHouseType().") с количеством комнат, равным ".$this->getRoomCount().", ценой, ".$this->getFormatedPrice()." тенге";
      }


    }
