<?php

//NewsCategory

//public - модификатор доступа
class Car {
    const WHEELS = 4; 
    public function test() {
        echo Car::WHEELS;
        echo "<br>";
        echo self::WHEELS;
    }
}

class Bicycle {
    const WHEELS = 2;
    public function test() {
        echo Car::WHEELS;
        echo "<br>";
        echo self::WHEELS;
    }
}
//echo Car::WHEELS;
//echo "<br>";
//echo Bicycle::WHEELS;
//echo "<br>";
//$car1 = new Car;
//$car1->test();

$b = new Bicycle;
$b->test();
?>