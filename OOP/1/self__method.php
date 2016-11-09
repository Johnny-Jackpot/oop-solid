<?php

//NewsCategory

//public - модификатор доступа
class Car {
    const WHEELS = 4;
    public $color;
    
    public function test() {
        echo $this->color;
        echo "<br>";
        echo self::WHEELS;
    }
}

$car1 = new Car;
$car1->color = "White";
$car1->test();


?>