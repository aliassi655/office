<?php

require __DIR__.'/../models/TicketModel.php';
require __DIR__.'/../models/CityModel.php';
require __DIR__.'/../models/CompanyModel.php';
trait result {

public function show($arr){
    $data=array();
    foreach($arr as $val){
        $city=$this->city->getCityById($val['city_id']);
        $company=$this->Company->getCompanyById($val['company_id']);
        $d=[
        'company_name'=>$company['title'],
        'city_name'=>$city['name'],
        'date_s'=>$val['date_s'],
        'date_e'=>$val['date_e']
        ];
       
           array_push($data,$d); }

        $res=[
            'data'=>$data,
            'status'=>"success"
         ];
        echo json_encode($res);
        
       
        
}

}


        class TicketController{
       use result;
       private $model;
  
        public function __construct($db) {
      
        $this->model = new TicketModel($db);
        $this->city=new CityModel($db);
        $this->Company=new CompanyModel($db);

    }

        public function indexTickets(){
        $res= $tickets=$this->model->getTicket();
    //  $this->show($tickets);
       $this->show($res);
}   
       public function getTicketByCityId($id){

       $res= $this->model->getTicketByCityId($id);
       $this->show($res);
     

}
       public function getTicketByCompanyId($id){

       $res= $this->model->getTicketByCompanyId($id);
 
       $this->show($res);

}

       public function getTicketByDate($date_s){

       $res= $this->model->getTicketDate($data_s);
 
       $this->show($res);

}



}
?>