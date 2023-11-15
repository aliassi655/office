<?php
require __DIR__.'/../models/CustomerModel.php';
class CustomerController{

private $model;
public function __construct($db) {
    $this->model = new CustomerModel($db);


}

public function add($data)
{

if($this->model->addCustomer($data))
{
    echo "inserted now";
}else
{
    echo "falied";
}

}

}
?>