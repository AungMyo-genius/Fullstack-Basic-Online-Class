<?php

class Drinks{

  const constant1 = 'constant variable';

  function printConstant()
  {
    echo self::constant1;
  }

  public static $staticVar = 'static variable';

  public static function staticFunction()
  {
    echo 'static function';
  }
}


// echo Drinks::constant1;
// $obj = new Drinks();
// $obj->printConstant();

// echo Drinks::$staticVar;
echo Drinks::staticFunction();
