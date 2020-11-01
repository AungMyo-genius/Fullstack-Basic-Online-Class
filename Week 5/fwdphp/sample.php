<?php

  //variable
    // $var = 1;
    // $var = 'hello';

    // echo $var;
    // print_r($var);
    // var_dump($var);


  //data type
    //string
    //integer
    // float, double
    // boolean
    // array
    // object
    // null
    // $string = "Hello";
    // $integer = 1;
    // $float = 1.5;
    // $boolean = false;
    // $array = ['name'=>"hlaing",'age'=>'20'];
    // $array1 = ["hlaing",'20'];
    //
    // $object = new stdClass();
    // $object->name = 'hlaing';
    // $objArr = (object) $array;
    // var_dump($objArr->name);

  //operations (+,-,*,/,%)

    // $var1 = 1;
    // $var2 = 2;

    // echo $var1%$var2;

  //operators (<,>,=,==,===,!=,<>)

    // = assign variable, set variable
    // == check content, not data type
    // === check content & data type
    // !=,<> not equal
    // >,<, >= ,<=
    // && must, || or

    // $var = 'hello';
    // if ('hello' == 'hello' || 'hello' == 'aa') {
    //   echo 'here';
    // }else{
    //   echo 'there';
    // }

  // conditional statement
    // $var1 = 4;
    // $var2 = 2;

    // if ($var2 < $var1) {
    //   echo 'same';
    // }elseif ($var2 == $var1) {
    //   echo 'equal elseif';
    // }else{
    //   echo 'lesser';
    // }
    // switch ($var1) {
    //   case '1':
    //     echo '1';
    //     break;
    //   case '2':
    //     echo '2';
    //     break;
    //   case '3':
    //     echo '3';
    //     break;
    //   default:
    //     echo 'this is default';
    //     break;

    // looping
      //for loop
      // $e = 5;
      // for ($i=0; $i < $e; $i++) {
      //   echo $i;
      // }

      //while loop
      // $a = 0;
      // while ($a <= 10) {
      //   echo $a;
      //   $a++;
      // }

      //do while loop
      // $a = 0;
      // do {
      //   echo $a;
      //   if ($a == 5) {
      //     break;
      //   }
      //   $a++;
      // } while ($a <= 10);

      //foreach loop
      // $array = ['name'=>'hlaing','age'=>'23'];
      // foreach ($array as $value) {
      //   echo $value."<br>";
      // }

    //array

      //numeric array
        // $array = ['val1','val2','val3'];
        // print_r($array[0]);

      //associate array
        // $array = array('name'=>'hlaing','age'=>'20','phone'=>'097197');
        // print_r($array['phone']);

      //multidimentional array
        // $array = array(
        //   'name' => array('student1'=>'mg mg','student2'=>'hla hla'),
        //   'age' => array('mgmg'=>20,'hlahla'=>21)
        // );
        // print"<pre>";
        // print_r($array);

      // function getName($name)
      // {
      //   // echo "my name is $name";
      //   echo 'my name is '.$name;
      // }
      //
      // getName('hsu');

    //super global variable
    // $_POST
    // $_GET
    // $_SESSION
    // $_COOKIE
    // $_SERVER

    //session and cookie
      //cookie
      // setcookie('name','hlaing',time()+60,'/');
      //
      // print_r($_COOKIE['name']);

      //session
      // $_SESSION['key1'] = 'value1';
      // $_SESSION['key2'] = 'value2';
      //
      // print_r($_SESSION['key1']);

    //file operations
      // $file = fopen('test.txt','w');
      // fwrite($file,"Hello world from file operation code");
      // fclose($file);
      //
      // echo file_get_contents('test.txt');

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="sample.php" method="post">
      <input type="text" name="name" value="">Name
      <input type="text" name="" value="">phone

      <input type="submit" name="" value="Create">
    </form>
  </body>
</html>
