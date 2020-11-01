Constants cannot be changed once it is declared.

Class constants can be useful if you need to define some constant data within a class.

A class constant is declared inside a class with the const keyword.

Class constants are case-sensitive. However, it is recommended to name the constants in all uppercase letters.
<?php
class Goodbye {
  const LEAVING_MESSAGE = "Thank you";
  public function byebye() {
    echo self::LEAVING_MESSAGE;
  }
}

echo Goodbye::LEAVING_MESSAGE;
// $goodbye = new Goodbye();
// $goodbye->byebye();
?>
