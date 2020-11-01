<?php

class Drinks {
  var $name = "shark";
  var $price = 100;

  function setName($name) {
    $this->name = $name;
  }

  function getName() {
    echo $this->name."<br />";
  }

  function setPrice($price) {
    $this->price = $price;
  }

  function getPrice() {
    echo $this->price."<br />";
  }

}

class Juice extends Drinks {

}

$someDrinks = new Juice();
$someDrinks->setName("Apple Juice");
$someDrinks->getName();




?>
