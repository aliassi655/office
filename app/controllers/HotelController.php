<?php
require __DIR__.'/../models/HotelModel.php';
require_once __DIR__.'/../models/CityModel.php';

trait show {

    public function show1($arr) {
        $data=array();
        //var_dump($arr);
        foreach($arr as $val){
            $city=$this->city->getCityById($val['city_id']);
            //var_dump($city);
            
           $d = [
                'name'=>$val['name'],
                'city_name'=>$city['name']
            ];

            array_push($data,$d);
    }
        $res=[
        'data'=>$data,
        'status'=>"success"
        ];
        echo json_encode($res);
    }

    public function show2($arr){

        $city=$this->city->getCityById($arr['city_id']);
        $data=[
            'name'=> $arr['name'],
            'city_name'=> $city['name']

                ];
        
        
        $res=[
            'data'=>$data,
            'status'=>"success"
                 ];
        echo json_encode($res);}
                
               
                
        }


class HotelController {
    use show;
    private $model;
    private $city;
    public function __construct($db) {
        $this->model = new HotelModel($db);
        $this->city = new CityModel($db);
    }

    public function indexHotel($id) {
        $hotels = $this->model->getHotelById($id);
        $this->show2($hotels);
        //var_dump($hotels);
    }

    public function getHotelByCityId($id) {
       $hotels = $this->model->getHotelByCityId($id);
       $this->show1($hotels);
    }

    public function addHotel() {
    if($_SERVER['POST_REQUEST']==='POST'){

        $data = [
        'name'=>$_POST['name'],
        'city_id'=>$_POST['city_id']
        ];
        if($this->model->addHotel($data)) {

        echo json_encode(['status'=>'added']);

        }
        else {
            echo json_encode(['status'=>'notadded']);
        }
    }
    else {
        echo json_encode(['status'=>'not data in post']);
    }

}
    public function deleteHotel($id) {
        if($_SERVER['POST_REQUEST']==='POST')
        {
        if($this->model->deleteHotel($id)) {
            
            echo json_encode(['status'=>'deleted']);
    
            }
            else {
                echo json_encode(['status'=>'notdeleted']);
            }
        }else {
            echo json_encode(['status'=>'not data in post']);
        }
    }
} 