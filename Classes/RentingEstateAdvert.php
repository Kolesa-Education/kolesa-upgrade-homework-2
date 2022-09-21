<?php
require_once("EstateAdvert.php");

  class RentingEstateAdvert extends EstateAdvert{

    protected string $m_category;
    protected string $m_period;

    public function __construct(float $price,int $roomCount,string $houseType,string $period){
      parent::__construct($price,$roomCount,$houseType,"Сдача");
      $this->m_period=$period;
    }


    public function getCategory():string{
      return $this->m_category;
    }
    public function setCategory(string $category){
       $this->m_category=$category;
    }


    public function setPeriod(string $period){
      $this->period=$period;
    }
    public function getPeriod():string{
      return $this->m_period;
    }

    public function getTitle() :string{
        return "Сдам ". $this->getHouseType() ." с количеством комнат, равным ".$this->getRoomCount().", ценой, ".$this->getFormatedPrice()." тенге в ". $this->getPeriod();
    }






  }
