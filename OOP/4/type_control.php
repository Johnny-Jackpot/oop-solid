<?php

class Student {
    public $name;
    public $results;
    
    //explicitly declare type of needed argument
    function __construct($name, array $results) {
        echo '<br>Student ' . $name . ": ";
        foreach ($results as $subject => $item) {
            echo '<br>' . $subject . ': ' . $item;
        }
        echo '<hr>';
    }
}

$student1 = new Student('John', array('math' => 3, 'biology' => 4));
$student2 = new Student('Rob', array('math' => 4, 'biology' => 5));

//$student3 = new Student('Maria', 1);

class User {
    public $firstname;
    public $lastname;
}

//explicitly declare that argument must be an instance of User (object of class)
function getFullName(User $user) {
    return $user->firstname . ' ' . $user->lastname;
}

$user1 = new User;
$user1->firstname = "Bob";
$user1->lastname = "Bowden";

echo getFullName($user1);
echo '<br>';
//echo getFullName('string');

class SuperUser extends User {
    
}

$user2 = new SuperUser;
$user2->firstname = 'Jack';
$user2->lastname = 'Sparrow';
//можно передавать объекты наследников класса User
echo getFullName($user2);


/*
Сигнатура метода - имя метода, число аргументов и типы аргументов (при использовании 
контроля типов).
*/

public function hello($time, array $user) {}
public function hello($time, User $user) {}








?>