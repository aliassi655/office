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

$cont= new TicketController($db);

 $cont->getTicketByCompanyId(1);


   
?>