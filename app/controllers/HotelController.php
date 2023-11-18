<?php



class HotelController{
use test;
public function __construct($db) {
    $this->model = new HotelModel($db);
}

public function addHotel(){
if($_SERVER['REQUEST_METHOD']=='POST'){

$data=[
'name'=>$_POST['name'],
'city_id'=>$_POST['city_id']
];
$result=$this->model->addHotel($data);
$this->testing($result);
}else{
    echo json_encode(["status"=>'no data in post']);

}}


public function deletehotel(){
    if($_SERVER['REQUEST_METHOD']=='POST'){
       $data=$this->model->deleteHotel($_POST['id']);
       $this->testing($data);
  
        }else{
              echo json_encode(["status"=>'no data in post']);
        }



}
public function getHotelsByCityId(){
    if($_SERVER['REQUEST_METHOD']=='POST'){

      $data=$this->model->getHotelByCityId($_POST['city_id']);
       $this->testing($data);
     }
     else{
        echo json_encode(["status"=>'no data in post']);;
    }



}












}


?>