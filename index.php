<?php

// require_once __DIR__. '/app/controllers/AirlineController.php';

require_once __DIR__. '/app/controllers/TicketController.php';
require_once __DIR__. '/app/controllers/CustomerController.php';
require_once __DIR__. '/app/controllers/HotelController.php';
require_once __DIR__. '/app/controllers/RatingController.php';
require_once __DIR__.'/config/config.php';
require_once __DIR__. '/lib/DB/MysqliDb.php';

$config = require 'config/config.php';
$db = new MysqliDb(
    $config['db_host'],
    $config['db_user'],
    $config['db_pass'],
    $config['db_name']
);

$cont= new TicketController($db);

 //$cont->getTicketByCompanyId(1);
 //var_dump($cont);
 //$city = new CityModel($db);
 //var_dump($city);
 $hotel = new HotelController($db);
 //var_dump($db);
 //$hotel->indexHotel(6);
 //$hotel->deleteHotel();
 //$hotel->getHotelByCityId(1);
 $rating = new RatingController($db);
 //var_dump($db);
 $rating->getRatingById(2);
 //$rating->indexRatings();
// $rating->getRatingByHotelId(6);
//$rating->addRating();
//$rating->updateRating(1);
//$rating->deleteRating(1);



   
?>