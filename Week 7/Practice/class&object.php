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

$someDrinks = new Drinks();
// echo $someDrinks->name;
$someDrinks->setName("coke");
$someDrinks->setPrice(200);
$someDrinks->getName();
$someDrinks->getPrice();


?>
