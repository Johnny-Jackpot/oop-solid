<?php
/*
Принцип подстановки Барбары Лисков. (Liskov Substitution Principle, LSP)

Это третий из пяти принципов SOLID и наиболее сложный для понимания.
В оригинале данный принцип звучит так:

    Пусть q(x) является свойством, верным относительно объектов x некоторого типа T.
    Тогда q(y) также должно быть верным для объектов y типа S,
    где S является подтипом типа T.

Роберт Мартин перефразировал это так:

    Функции, которые используют базовый тип, 
    должны иметь возможность использовать подтипы базового типа, не зная об этом.

Иными словами -

    Поведение наследуемых классов не должно противоречить поведению, 
    заданному базовым классом, то есть поведение наследуемых классов должно 
    быть ожидаемым для кода который использует базовый класс.
*/

class Bird {
    public function fly(){
        $flyspeed = 10;
        return $flyspeed;
    }
}

/*
* Дочерний класс от Bird. 
* Не изменяет поведение, но дополняет.
* Не нарушает принцип LSP
*/
class Duck extends Bird {
    public function fly() {
        $flyspeed = 8;
        return $flyspeed;
    }
    
    public function swim() {
        $swimSpeed = 2;
        return $swimSpeed;
    }
}
/**
* Дочерний класс от Bird. 
* Изменяет поведение.
* Нарушает принцип LSP
*/
class Penguin extends Bird {
    public function fly() {
        //die('i can`t fly'); // не типичное поведение - die или exception
        return 'i can`t fly'; // не типичное поведение - возвращаем string, а не integer
    }
    public function swim() {
        $swimSpeed = 4;
        return $swimSpeed;
    }
}

//BirdRun.php
class BirdRun {
    private $bird;
    
    public function __construct(Bird $bird) {
        $this->bird = $bird;
    }
    
    public function run() {
        $flySpeed = $this->bird->fly();
    }
}
//index.php
$bird = new Bird();
//$bird = new Duck();
//$bird = new Penguin();
$birdRun = new BirdRun($bird);
$bird->run();

/*
После замены использования Bird на Duck код будет работать 
как и прежде - принцип LSP соблюден.
После замены Bird на Penguin код меняет свое поведение, 
cледовательно в данном случае принцип LSP нарушен.

Следовать этому типу очень важно при проектировании новых типов 
с использованием наследования.
Этот принцип предупреждает о том, что изменение унаследованного 
производным типом поведения очень рискованно.
*/



















?>