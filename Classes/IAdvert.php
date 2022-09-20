<?php


  interface IAdvert
  {
    public function getPrice() :float;
    public function setPrice(float $price);
    public function getFormatedPrice():string;

    public function getTitle() :string;
  }
