<?php

// require_once __DIR__. '/app/controllers/AirlineController.php';

require_once __DIR__. '/app/controllers/TicketController.php';
require_once __DIR__. '/app/controllers/CustomerController.php';
require_once __DIR__.'/config/config.php';
require_once __DIR__. '/lib/DB/MysqliDb.php';

$config = require 'config/config.php';
$db = new MysqliDb(
    $config['db_host'],
    $config['db_user'],
    $config['db_pass'],
    $config['db_name']
);

$cont= new CustomerController($db);
// $company_id=$_POST['company_id'];
// $city_id=$_POST['city_id'];
// $date_s=$_POST['date_s'];
// $date_e=$_POST['date_e'];
$data=[
'name'=>'hasan',
'mobile'=>'0991',
'gender'=>'male',
'email'=>'hasan.com',
];
$cont->add($data);
// $url= $_SERVER['REQUEST_URI'];

// define("PAGE_PATH",'/mvc/');
// echo PAGE_PATH;   
?>