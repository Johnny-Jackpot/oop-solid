<?php
//encapsulation

class Phone {
    public function getNumberByName($name) {
        //public - доступ к методу
    }
    public function dialNumber($num) {
        //.
    }
    public function call($name) {
        //public - доступ к методу из любого места программы
        $number = $this->getNumberByName($name);
        $this->dialNumber($number);
    }
    
    //protected - позволяет получать доступ текущему классу и наследуемым
    //private - к члену имеет доступ только клас в котором он объявлен
}

$phone1 = new Phone;
$phone1->call('Rob');


?>