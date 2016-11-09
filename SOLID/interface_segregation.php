<?php
/*
Принцип разделения интерфейса (Interface Segregation Principle, ISP).

Четвертый SOLID принцип из пяти.
Формулировка:

    Клиенты не должны зависить от методов, которые они не используют.

или

    Много специализированных интерфейсов лучше, чем один универсальный.

Иными словами большие, объемные интерфейсы надо разбивать на мелкие таким образом, 
чтобы клиенты маленьких интерфейсов знали только о тех методах которые необходимы 
им в работе. И чтобы при изменении метода интерфейса не должны меняться клиенты, 
которые этот метод не используют.
*/
//Itransformer.php
interface ISuperTransformer {
    public function toCar();
    public function toPlane();
    public function toShip();
}
//transformers.php
class SuperTransformer implements ISuperTransformer {
    public function toCar() {
        echo 'transform to car';
    }
    public function toPlane() {
        echo 'transform to plane';
    }
    public function toShip() {
        echo 'transform to ship';
    }
}
class CarTransformer implements ISuperTransformer {
    public function toCar() {
        echo 'transform to car';
    }
    public function toPlane() {
        throw new Exception('i can`t transform to plane');
    }
    public function toShip() {
        throw new Exception('i can`t transform to ship');
    }
}

//Разбиваем на несколько интерфейсов.

//Itransformer.php
interface ICarTransformer {
    public function toCar();
}
interface IPlaneTransformer {
    public function toPlane();
}
interface IShipTransformer {
    public function toShip();
}

//Transformers.php
class SuperTransformer implements ICarTransformer, 
                                  IPlaneTransformer, 
                                  ShipTransformer {
//....
}
class CarTransformer implements ICarTransformer {
    public function toCar() {
        echo 'transform to car';
    }
}




























?>