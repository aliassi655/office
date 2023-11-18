<?php
require __DIR__.'/../models/AdminModel.php';

class AdminController
{
private $model;
public function __construct($db) 
{
    $this->model=new AdminModel($db);
}

public function addadmin($data){
    if ($_SERVER['REQUEST_METHOD']==='POST') 
    {$name = $_POST['name'];
     $email = $_POST['email'];
     $password = $_POST['password']; 
 
     $data = ['name'=>$name,'email'=>$email,'password'=>$password];
    
       if($this->model->addAdmin($data))
        {$res=['status'=>"success add"];
            echo json_encode($res);}
        else
        {$res=['status'=>"faild add"];
            echo json_encode($res);}}}

 public function deleteAdminbyid($id)
{
  if ($_SERVER['REQUEST_METHOD']==='POST'){
     $id = $_POST['id'];
       if($this->model->deleteAdmin($id))
       {$res=['status'=>"success delete"];
               echo json_encode($res);}
        else
       {$res=['status'=>"faild delete"];
               echo json_encode($res);}}}

               public function updateadmin($id,$data){
                 if ($_SERVER['REQUEST_METHOD']==='POST') 
                { $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = $_POST['password']; 
                    $data = ['name'=>$name,'email'=>$email,'password'=>$password];
                    if($this->model->updateAdmin($id,$data))
                {$res=['status'=>"success update"];
                    echo json_encode($res);}
                else
                {$res=['status'=>"faild update"];
                    echo json_encode($res);}}}

}


















?>