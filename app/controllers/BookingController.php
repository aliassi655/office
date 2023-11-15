<?php

require __DIR__.'/../models/Book_flightModel.php';
class Book_flightController{

private $model;
public function __construct($db) {
    $this->model = new Book_flightModel($db);


}


public function index(){


$a=$this->model->getBooks();
print_r($a);

}



}








?>