<?php

  require_once("Classes/SellingEstateAdvert.php");
  require_once("Classes/RentingEstateAdvert.php");
  require_once("Control/IAdvertControl.php");


  class AdvertControl implements IAdvertControl {

    protected array $m_Adverts=array();

    public function __construct(array $advertArr){

      $this->TransferArray($advertArr);

    }


    public function TransferArray(array $arr){



      foreach ($arr as $key => $value) {

        if($value["category"] == "продажа"){
          $this->m_Adverts[$key] = new SellingEstateAdvert($value["price"],$value["rooms"],$value["type"]);
        }
        else if($value["category"]=="сдача"){
          $this->m_Adverts[$key] = new RentingEstateAdvert($value["price"],$value["rooms"],$value["type"],$value["period"]);
        }

      }







    }


    public function PrintArr(){
      foreach ($this->m_Adverts as $ad) {
          echo ($ad->getTitle() . " |  <br>");
      }
    }



  }
