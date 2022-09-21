<?php
require_once("EstateAdvert.php");

  class SellingEstateAdvert extends EstateAdvert{


    protected string $m_category;

    public function __construct(float $price,int $roomCount,string $houseType){
      parent::__construct($price,$roomCount,$houseType,"Продажа");
    }


    public function getCategory():string{
      return $this->m_category;
    }
    public function setCategory(string $category){
       $this->m_category=$category;
    }

    public function getTitle() :string{
        return "Продам ". $this->getHouseType() ." с количеством комнат, равным ".$this->getRoomCount().", ценой, ".$this->getFormatedPrice()." тенге";
    }


  }
