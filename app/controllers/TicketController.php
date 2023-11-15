<?php

require __DIR__.'/../models/TicketModel.php';
class TicketController{

private $model;
public function __construct($db) {
    $this->model = new TicketModel($db);


}

public function add($data)
{

if($this->model->addTicket($data))
{
    echo "inserted";
}else
{
    echo "falied";
}

}

}








?>