<?php

$module     = $_GET['module'];
$controller = ucfirst(strtolower($_GET['controller'])) . "Controller";
$action     = ucfirst(strtolower($_GET['action'] . "Action"));

// Let's say for arguments sake then that you've gone to:
//
// index.php?module=admin&controller=admin&action=home
//
// Ignore the fact that this is horrificially insecure 
// (running code on demand from the URL without validation!)
// you would be accessing:
//
// modules/admin/Controller/AdminController.php
//
// You'd then be making a new object (new $controller()) which
// would be a new AdminController(). and then calling the method
// homeAction(). 
//
// So, if you want to know what stuff is going on, check that file
// out too, go have a look at it!

$file = realpath(dirname(__FILE__)) . "/modules/" . $module . "/Controller/" . $controller . ".php";

require_once $file;
require_once realpath(dirname(__FILE__)) . "/modules/core/DepencyInjection/ServiceContainer.php";
require_once realpath(dirname(__FILE__)) . "/modules/core/Gateway/ImageGateway.php";

$container = new ServiceContainer();
$container->setService('dbal.default',  new PDO("mysql:host=localhost;dbname=CFARC", 'CFARC', 'CFARC1'));
$container->setService('gateway.image', new ImageGateway($container->getService('dbal.default')));

$controller = new $controller();
$controller->setContainer($container);
$controller->$action();
