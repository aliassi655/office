<?php
require __DIR__.'/../models/CustomerModel.php';
class CustomerController{
private $model;
public function __construct($db) 
{$this->model = new CustomerModel($db);}

public function indexcustomer(){
$cust=$this->model->getCustomers();
$res=['data'=>$cust,'status'=>"success"];
echo json_encode($res);}

public function add($data){
if ($_SERVER['REQUEST_METHOD']=='POST') 
{$name = $_POST['name'];
 $mobile = $_POST['mobile'];
 $gender = $_POST['gender'];
 $email = $_POST['email'];  
 $data = ['name' => $name,'mobile' => $mobile,'gender' => $gender,'email'=>$email];

   if($this->model->addCustomer($data))
    {$res=['status'=>"success add"];
        echo json_encode($res);}
    else
    {$res=['status'=>"faild add"];
        echo json_encode($res);}}}

public function deletecustomer($id)
{
 if ($_SERVER['REQUEST_METHOD']==='POST'){
     $id = $_POST['id'];
       if($this->model->deleteCustomer($id))
       {$res=['status'=>"success delete"];
               echo json_encode($res);}
        else
       {$res=['status'=>"faild delete"];
               echo json_encode($res);}}}

public function updatecustomarid($id,$data){
     if ($_SERVER['REQUEST_METHOD']==='POST')
    {
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];  
        $data = ['name' => $name,'mobile' => $mobile,'gender' => $gender,'email'=>$email];
   if($this->model->updateCustomer($id,$data))
    {$res=['status'=>"success update"];
        echo json_encode($res);}
    else
    {$res=['status'=>"faild update"];
        echo json_encode($res);}}}

public function grtcustomeremail($email)
{
    if ($_SERVER['REQUEST_METHOD']==='POST')
    {$email=$_POST['email'];
    $custemail=$this->model->getCustomerBygmail($email);
    $res=['data'=>$custemail,'status'=>"success"];
      echo json_encode($custemail);}}

}
?>