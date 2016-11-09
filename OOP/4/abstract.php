<?php
/*
Абстрактный класс - базовый класс, который не предполагает создания экземпляров.
Он содержит характеристики сущности, которые отличают её от других сущностей.

Абстрактный метод - метод класса, реализация для которого отсутствует.

1. Сигнатуры методов должны совпадать, контроль типов(type hint) и количество
обязательных аргументов должно быть одинаковым

2. Абстрактные методы могут иметь обычные методы и абстрактные методы.

3. Если класс содержит хотя бы 1 абстрактный метод, он должен быть объявлен
как абстрактный.
*/
abstract class Publication {
    public $id;
    public $title;
    public $date;
    public $short_content;
    public $content;
    public $preview;
    public $author_name;
    public $type;
    
    abstract public function printItem();
    
    function __construct($row) {
        $this->id = $row["id"];
        $this->title = $row["title"];
        $this->date = $row["date"];
        $this->short_content = $row["short_content"];
        $this->content = $row["content"];
        $this->preview = $row["preview"];
        $this->author_name = $row["author_name"];
        $this->type = $row["type"];
    }
}
/*
class AudioPublication extends Publication {
    //implement printItem
}
*/

class NewsPublication extends Publication {
    public function printItem() {
        //echo '<br> Method  ' . __METHOD__ . ' was called.';
        //echo '<br> This is news.';
        //echo '<hr>';
        echo '<br>News: ' . $this->title;
        echo '<br>Data: ' . $this->date;
        echo '<hr>';
    }
}

class ArticlePublication extends Publication {
    public function printItem() {
       // echo '<br> Method  ' . __METHOD__ . ' was called.';
       // echo '<br> This is article.';
        //echo '<hr>';
        echo '<br>Article: ' . $this->title;
        echo '<br>Author: ' . $this->author_name;
        echo '<hr>';
    }
}

class PhotoReportPublication extends Publication {
    public function printItem() {
        //echo '<br> Method  ' . __METHOD__ . '  was called.';
        //echo '<br> This is photo report.';
        //echo '<hr>';
        echo '<br>Photo report : ' . $this->title;
        echo '<br><img src="http://localhost/test2/' . $this->preview . '">';
        echo '<hr>';
    }
}
//$a = new Publication; //fatal error


abstract class Human{
    abstract public function printHello();
    public function printHelloName($name) {
        echo '<br>Hello, ' . $name;
    }
}

class Student extends Human {
    //если в методе родителя нету аргументов, а в методе наследника нужны:
    //следует указать значение по умолчанию, что б избежать ошибки
    public function printHello($name = '') {
        
    }
    
}





















?>