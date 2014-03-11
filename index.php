<?php

// This is still horrible! Get variables are naughty without validations and sanitisation
$module     = $_GET['module'];
$controller = ucfirst(strtolower($_GET['controller'])) . "Controller";
$action     = ucfirst(strtolower($_GET['action'] . "Action"));

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
