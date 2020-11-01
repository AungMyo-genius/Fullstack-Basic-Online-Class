<?php

class Drinks
{
  function __construct($name,$price)
  {
    
    $this->name = $name;
    $this->price = $price;
  }

  function __destruct()
  {
    echo 'destruct';
  }


  function getPrice(){
    echo $this->price."<br/>";
  }

  function getName(){
    echo $this->name."<br/>";
  }
}

$somedrink = new Drinks('coke','100');

$somedrink->getPrice();
