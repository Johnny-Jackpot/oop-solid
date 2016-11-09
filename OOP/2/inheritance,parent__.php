<?php
//inheritance
class Vehicle {
    public $color;
    public $speed;
    public $brand;
    
    public function tripTime($distance) {
        return $distance / $this->speed;
    }
    
    final public function smth() {
        //финальный метод, который нельзя переопределить в классах потомках
    }
}

final class Truck {
    //финальный класс от которого нельзя наследовать
}

class Bicycle extends Vehicle {
    public $type;
    public $color = "White"; // переопределение свойства
    const CALORIES_PER_HOUR = 500;
    
    public function caloriesBurned($distance) {
        $time = $this->tripTime($distance);
        $calories = self::CALORIES_PER_HOUR * $time;
        return $calories;
    }
    
    //overriding
    public function tripTime($distance) {
        return parent::tripTime($distance) * 1.2; // вызов метода родителя
        //parent::CONST_VALUE доступ к константе родителя
        //return $distance / $this->speed * 1.2;
    }
}

class Car extends Vehicle {
    public $fuel;
    public $color = "Yellow";
    
    public function fuelConsumption($distance) {
        return ($this->fuel * $distance) / 100;
    }
}

$car1 = new Car;
$car1->speed = 110;
$car1->fuel = 12;

$car2 = new Car;
$car2->speed = 130;
$car2->fuel = 14;

$bicycle = new Bicycle;
$bicycle->speed = 20;

$distance = 300;

echo "car 1 time: ", $car1->tripTime($distance), "\n";
echo "car 2 time: ", $car1->tripTime($distance), "\n";
echo "bicycle time: ", $bicycle->tripTime($distance), "\n";

echo "\n";

echo "car 1 fuel consumption: ", $car1->fuelConsumption($distance), "\n";
echo "car 2 fuel consumption: ", $car1->fuelConsumption($distance), "\n";
echo "bicycle calories Burned: ", $bicycle->caloriesBurned($distance), "\n";









?>