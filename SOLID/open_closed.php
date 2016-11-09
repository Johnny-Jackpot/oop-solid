<?php
/*
Принцип открытости / закрытости. (Open/closed principle)

Второй принцип из списка принципов SOLID.
Классы (модули, функции) должны быть открыты для расширения и закрыты для изменения.
Иными словами приложение следует проектировать так чтобы для изменения поведения
класса, нам не потребовалось менять код самого класса.
*/

//logger.php
class Logger {
    private function saveToFile($message) {
        //...
    }
    public function log($message) {
        //..
        $this->saveToFile($message);
    }
}
//product.php
class Product {
    protected $logger;
    
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

/*
В данном примере мы имеем два класса. 
Класс Product который отвечает за работу с товаром. 
И класс Logger цель которого логировать ошибки в текстовый файл.

Задача:
Сделать логирование не в текстовый файл, а в базу данных.
(либо логироваться в БД должен только класс Product, 
но другие классы, которые используют Logger, 
должны логировать в файл как и прежде)

В данном примере, для того чтобы реализовать требования заказчика, 
мы нарушаем принцип открытости/закрытости.
Так как будем вынуждены модифицировать существующие классы.
Если функционал нашей системы не сложен, то этим можно пренебречь, 
но если система у нас большая, 
то изменения в классах могут вызвать непредсказуемые ошибки.

Для того чтобы следовать принципу открытости/закрытости 
организовать нашу систему можно следующим образом.
*/

//LoggerInterface.php
interface Ilogger {
    public function log();
}
//logger.php
class FileLogger implements Ilogger {
    private function saveToFile($message) {
        //..
    }
    public function log($message) {
        //...
        $this->saveToFile($message);
    }
}

class DbLogger implements Ilogger {
    private function saveToDb($message) {
        //....
    }
    public function log($message) {
        //...
        $this->saveToDb($message);
    }
}
//product.php
class Product {
    protected $logger;
    
    public function __construct(Ilogger $logger) {
        $this->logger = $logger;
    }
    
    public function setPrice($price) {
        try {
            //save price to Db
        } catch (DbException $e) {
            $this->logger->log($e->getMessage());
        }
    }
}
//index.php
$logger = new DbLogger();
$product = new Product($logger);
$product->setPrice(10);











?>