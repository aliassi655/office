<?php
require __DIR__.'/../models/AdminModel.php';

class AdminController{
    use test;
    private $model;
    public function __construct($db) {
        $this->model = new AdminModel($db);
    }

public function addAdmin(){

    if($_SERVER['REQUEST_METHOD']=='POST'){
$d=['name'=>$_POST['name'],
'email'=>$_POST['email'],
'password'=>$_POST['password']];


$data=$this->model->addAdmin($d);
$this->testing($data);}
else{

echo json_encode(['status'=>'no data in post']);
}


}


public function deleteAdmin(){
    if($_SERVER['REQUEST_METHOD']=='POST'){
     $id=$_POST['id'];
    
    $data=$this->model->deleteAdmin($id);
    $this->testing($data);
}
}

public function updateAdmin($id){
    if($_SERVER['REQUEST_METHOD'])
     {
      $data=['name'=>$_POST['name'],
      'email'=>$_POST['email'],
      'password'=>$_POST['password']];
      $result=$this->model->updateAdmin($id,$data);
     $this->testing($result);

     }else{
     
        echo json_encode(["status"=>'no data in post']);
         

     }}
    }


?>