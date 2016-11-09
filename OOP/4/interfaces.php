<?php
/*
Интерфейс - это инструмент, который указывает какие методы должен включать класс,
без необходимости описания их функционала.

Абстрактный класс                                   Интерфейс
-свойства                                           ------------
-методы                                             -------------
-объявляет методы без реализации                    -объявляет методы без реализации
-создание экземпляра невозможно                     -создание экземпляра невозможно
-наследуется (extends)                              -реализируется (implements)
-наследник имеет только одного родителя             -наследник может реализовывать
                                                     методы нескольких интерфейсов
--------------------                                -все методы должны быть public 
*/

interface Vehicle {
    public function info();
}
interface Car extends Vehicle {
    public function drive();
}
interface Boat extends Vehicle {
    public function swim();
}

class Audi implements Car {
    public function info() {
        echo '<br>Audi is a German automobile manufacturer.';
    }
    
    public function drive() {
        echo '<br>Audi drives!';
    }
}

$audi_A3 = new Audi;
$audi_A3->info();
$audi_A3->drive();

//Множественное наследование классов запрещено, зато мы можем реализовывать
//несколько интерфейсов.

class MersedesAmphibious implements Car, Boat {
    public function info() {
        echo '<br>Mersedes is a German automobile manufacturer.';
    }
    public function drive() {
        echo '<br>Mersedes drives!';
    }
    public function swim() {
        echo '<br>Mersedes swim!';
    }
}

$MersedesAmphibious1 = new MersedesAmphibious;
$MersedesAmphibious1->info();
$MersedesAmphibious1->drive();
$MersedesAmphibious1->swim();

?>