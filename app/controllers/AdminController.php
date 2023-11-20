<?php
require __DIR__.'/../models/AdminModel.php';
//require_once('index.php');


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

echo json_encode(["status"=>'no data in post']);
}


}


public function deleteAdmin(){
    if($_SERVER['REQUEST_METHOD']=='POST'){
     $id=$_POST['id'];
    
    $data=$this->model->deleteAdmin($id);
    $this->testing($data);
}
}

public function updateAdmin( $id){
    
    if($_SERVER['REQUEST_METHOD'] === 'POST' )
     {
      $data=['name'=>$_POST['name'],
      'email'=>$_POST['email'],
      'password'=>$_POST['password']];
      $result=$this->model->updateAdmin($id,$data);
     $this->testing($result);

     }else{
     
        echo json_encode(["status"=>'no data in post']);
         

     }}


public function login() {
    
    $arr = getallheaders();
    $card = $arr['card'];

    if($this->model->getAdminByCard($card)){
        return true;
        
    }else{
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $admin = $this->model->getAdminByemailandpassword($email, $password);
        if($admin) {
            $card = rand(1,10);
            $data = [
                'email'=> $email,
                'password' => $password,
                'card' => $card
            ];
            if($this->model->updateAdmin(($admin['id']), $data))
             {
            echo json_encode(["status"=>'succses', 'card'=> $card]);

            }
            else {
                echo json_encode(["status"=>'failed']);
        }
    }else{
        echo json_encode(["status"=>'no data in post']);
    }
    }
    return false;
}
    }


}
?>