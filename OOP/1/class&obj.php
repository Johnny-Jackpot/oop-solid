<?php

//NewsCategory

//public - модификатор доступа
class Car {
    public $color = "White";
    public $speed;
    public $fuel;
    public $brand;
    public $model;
    
    public function __construct() {
        echo "<br>New object of class " . __CLASS__ . " created";
        echo "<br>Method " . __METHOD__ . " called";
    }
    
    public function __destruct() {
        echo "<br>Method " . __METHOD__ . " called";
        echo "<br>Object deleted";
    }
    
    public function test() {
        echo'<br>test function';
    }
    
    public function tripTime($distance) {
        $time = $distance / $this->speed;
        return $time;
    }
}

$BMW = new Car;
$BMW->speed = 250;
$BMW->fuel = 9;
$BMW->model = "M3";
$BMW->brand = "BMW";


$Lada = new Car;
$Lada->speed = 120;
$Lada->fuel = 10;
$Lada->model = "2101";
$Lada->brand = "Lada";
$Lada->color = "Red";

var_dump($BMW, $Lada);
var_dump($BMW->speed);

$BMW->test();
unset($BMW);
$Lada->test();

echo "<br>Lada time: " . $Lada->tripTime(1000) . " hours";


?>