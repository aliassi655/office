<?php
//require __DIR__.'/../models/CityModel.php';

class CityController
{
private $model;
public function __construct($db) 
{
    $this->model=new CityModel($db);
}


   public function addcity($data){
    if ($_SERVER['REQUEST_METHOD']==='POST') 
    {$name = $_POST['name'];
     $country = $_POST['country'];
 
     $data = ['name'=>$name,'country'=>$email];
    
       if($this->model->addCities($data))
        {$res=['status'=>"success add"];
            echo json_encode($res);}
        else
        {$res=['status'=>"faild add"];
            echo json_encode($res);}}}

            public function updateciity($id,$data){
              if ($_SERVER['REQUEST_METHOD']==='POST') 
             { $name = $_POST['name'];
                 $country	 = $_POST['country'];
                 
                 $data = ['name'=>$name,'email'=>$email];
                 if($this->model->updateCity($id,$data))
             {$res=['status'=>"success update"];
                 echo json_encode($res);}
             else
             {$res=['status'=>"faild update"];
                 echo json_encode($res);}}}







  public function indexcity(){
  $cust=$this->model->getCity();
  $res=['data'=>$cust,'status'=>"success"];
   echo json_encode($res);}


 }




?>