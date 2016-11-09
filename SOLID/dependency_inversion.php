<?php
/*
Принцип инверсии зависимостей (англ. Dependency Inversion Principle, DIP).

Пятый SOLID принцип.

Формулировка:

    Зависимости внутри системы строятся на основе абстракций.
    Модули верхних уровней не должны зависеть от модулей нижних уровней. 
    Оба типа модулей должны зависеть от абстракций.
    Абстракции не должны зависеть от деталей. Детали должны зависеть от абстракций.

Или

    Зависимости должны строится относительно абстракций, а не деталей.

На самом деле мы уже реализовывали этот принцип по мере изучения предыдущих
И чтобы не повторяться и чтобы вам было интересно приведем интересный жизненный пример.
*/
//husband.php
class LowRankingMale {
    public function eat() {
        $wife = new Wife();
        $food = $wife->getFood();
        //... eat
    }
}
//wife.php
class Wife {
    public function getFood() {
        //...
        return $food;
    }
}
/*
В данной системе низкоранговый самец - экземпляр класса lowRankingMale жестко 
зависит от класса Wife причем у него даже нет возможности выбора.
Такая система крайне не гибкая и если придется вносить изменения, 
то сделать это будет сложно. Если мы будем изменять класс Wife, 
то мы нарушим принцип Открытости/Закрытости.
Если мы создадим потомок класса Wife, то придется менять класс 
lowRankingMale и скорее всего другие иные классы, 
так как класс Wife может быть использован и в других классах.
*/

//husband.php
class AverageRankingMale {
    private $wife;
    
    public function __construct(Wife $wife) {
        $this->wife = $wife;
    }
    public function eat() {
        $food = $this->wife->getFood();
        //... eat
    }
}
/*
В этой системе среднеранговый самец уже по-умнее и может принимать разные 
экземпляры класса Wife. Но тем не менее у нас все равно остается жесткая 
зависимость от класса Wife и другой класс мы использовать не можем.
*/

//husband.php
class HighRankingMale {
    private $foodProvider;
    
    public function __construct(IFoodProvider $foodProvider) {
        $this->foodProvider = $foodProvider;
    }
    
    public function eat() {
        $food = $this->foodProvider->getFood();
        //.. eat
    }
}
//IFoodProvider.php
interface IFoodProvider {
    public function getFood();
}
//restaurant.php
class Restaurant implements IFoodProvider {
    public function getFood() {
        //...........
        return $food;
    }
}
//wife.php
class Wife implements IFoodProvider {
    public function getFood() {
        //....
        return $food;
    }
}

/*
А вот уже высокоранговый самец (highRankingMale) имеет полную свободу. 
Он не привязан ни к какому классу, а привязан к абстракции - к набору свойств.
И для того чтобы удовлетворить потребность в еде, 
он может выбрать любой объект класса который реализовывает интерфейс IFoodProvider.

Выбирайте высокоранговый путь, друзья - и в коде и в жизни! ))))
*/

?>