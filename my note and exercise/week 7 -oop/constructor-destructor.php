<?php

class Drinks {

  function __construct($name, $price) {
    $this->name = $name;
    $this->price = $price;
  }

  function __destruct() {
    echo "<br />Finally Destruct";
  }

  function getName() {
    echo $this->name;
  }

  function getPrice() {
    echo $this->price;
  }

}

$someDrinks = new Drinks("coke",100);
$someDrinks->getName();





?>
