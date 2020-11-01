<?php

//parent class
class Drinks
{
  var $name;
  var $price;

  function setPrice($price){
    $this->price = $price;
  }

  function getPrice(){
    echo $this->price."<br/>";
  }

  function setName($name){
    $this->name = $name;
  }

  function getName(){
    echo $this->name."<br/>";
  }
}

class Juice extends Drinks{

}

$juice = new Juice();
$juice->setName('apple juice');
$juice->getName();
$juice->setPrice('100');
$juice->getPrice();
