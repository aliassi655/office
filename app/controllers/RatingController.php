<?php
require __DIR__.'/../models/RatingModel.php';
require_once __DIR__.'/../models/CustomerModel.php';
require_once __DIR__.'/../models/HotelModel.php';

trait showing {

    public function show1($arr) {
        $data=array();
        foreach($arr as $val){
            $hotel = $this->hotel->getHotelById($val['hotel_id']);
            $customer = $this->customer->getCustomerById($val['customer_id']);
            
            $d = [
            'hotel_name' => $hotel['name'],
            'customer_name' => $customer['name'],
            'rate' => $val['rate'],
            'comment' => $val['comment']
                ];
            array_push($data,$d);
    }
        $res=[
        'data'=>$data,
        'status'=>"success"
        ];
        echo json_encode($res);
}

public function show2($arr) {
    $data=array();
    //var_dump($arr);
        $hotel = $this->hotel->getHotelById($arr['hotel_id']);
        $customer = $this->customer->getCustomerById($arr['customer_id']);
        //var_dump($city);
        
       $data = [
        'hotel_name' => $hotel['name'],
        'customer_name' => $customer['name'],
        'rate' => $arr['rate'],
        'comment' => $arr['comment']
        ];

    $res=[
    'data'=>$data,
    'status'=>"success"
    ];
    echo json_encode($res);}
}




class RatingController {
    use showing;
    private $model;
    private $customer;
    private $hotel;

    public function __construct($db) {
        $this->model = new RatingModel($db);
        $this->customer = new CustomerModel($db);
        $this->hotel = new HotelModel($db);
    }

    public function getRatingById($id) {
        $rating = $this->model->getRatingById($id);
        $this->show2($rating);
       //var_dump($rating);

    }

    public function indexRatings() {
        $ratings = $this->model->getRatings();
        $this->show1($ratings);
    }

    public function getRatingByHotelId($id) {
        $ratings = $this->model->getRatingByHotelId($id);
        $this->show1($ratings);
    }

    public function addRating() {

        if($_SERVER['POST_REQUEST']==='POST'){
        $data = [
            'hotel_id' => $_POST['hotel_id'],
            'customer_id' => $_POST['customer_id'],
            'rate' => $_POST['rate'],
            'comment' => $_GET['comment']
        ];

        if($this->model->addRating($data)) {

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

    public function updateRating($id) {

        if($_SERVER['POST_REQUEST']==='POST'){
            $data = [
                'rate' => $_POST['rate'],
                'comment' => $_GET['comment']
            ];

        if($this->model->updateRating($id, $data)) {

            echo json_encode(['status'=>'updateded']);
    
            }
            else {
                echo json_encode(['status'=>'notupdated']);
            }
        }
        else {
            echo json_encode(['status'=>'not data in post']);
        }
    }

    public function deleteRating($id) {
        if($_SERVER['POST_REQUEST']==='POST')
        {
        if($this->model->deleteRating($id)) {
            
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



