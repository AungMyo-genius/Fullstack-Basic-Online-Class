<?php

class MyClass{
  private $priData='';
  protected $protData='hello';
  public $pubData;

  function publicFunction(){
    return("public function");
  }

  protected function protectedFunction(){
    return("can access only from this class and its child class");
  }

  private function privateFunction(){
    return("can access only from this class");
  }
}

$obj = new MyClass();
// var_dump($obj->pubData = 'public Data'); true
// var_dump($obj->protData = 'public Data'); error
// var_dump($obj->priData = 'public Data'); error

// var_dump($obj->publicFunction());
// var_dump($obj->privateFunction());
