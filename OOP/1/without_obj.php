<?php

//NewsCategory

//public - модификатор доступа
class Car {
   public static $engine = 1;
   
   public static function whatIsIt() {
       echo "<br>This is a car.<br>";
   }
   
   public static function test() {
       echo self::$engine;
       self::whatIsIt();
   }
}

echo Car::$engine;
Car::whatIsIt();

Car::test();


?>