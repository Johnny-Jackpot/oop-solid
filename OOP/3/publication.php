<?php
require_once 'data.php';

foreach ($publications as $item) {
    ///echo '<pre>';
    //echo 'In variable $item live object of class: ' . get_class($item);
    //print_r($item->printItem());
    //echo '</pre>';
    $item->printItem();
}




?>