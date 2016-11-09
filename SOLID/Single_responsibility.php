<?php 
/*
Single responsibility principle
Принцип единственной обязанности (ответственности)
Обозначает, что любой объект должен иметь лишь одну обязанность 
и эта обязанность должна быть полностью реализована в классе объекта (инкапсулирована).

Из этого следует что должна быть одна причина чтобы вносить изменения в объект.
*/

//product.php
class Product {
    public function setPrice($price) {
        try {
            //set price in db
        } catch (DbException $e) {
            $this->logError($e->getMessage());
        }
    }
    public function logError($error) {
        //save error message
    }
}

//index.php
$product = new Product;
$product->setPrice(10);

/*
 Класс Product нарушает принцип единственной ответственности, 
 так как он имеет две ответственности:

    1) Работа с продуктом
    2) Логирование ошибок
    
То есть у нас могут быть две причины вносить в него изменения. 
Для того чтобы это исправить нам требуется вынести обязанность 
по логированию ошибок в отдельный класс (создаем файл logger.php):

*/

//logger.php
class Logger {
    public function log($message) {
        //....
        $this->saveToFile($message);
    }
}

//product.php
class Product {
    private $logger;
    
    public function __construct(Logger $logger) {
        $this->logger = $logger;
    }
    public function setPrice($price) {
        try {
            //save price in db
        } catch (DbException $e) {
            $this->logger->log($e->getMessage());
        }
    }
}

//index.php
$logger = new Logger();
$product = new Product($logger);
$product->setPrice(10);



?>