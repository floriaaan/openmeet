<?php

include "config.php";
require '../vendor/autoload.php';


$router = new \src\Router\Router($_GET['url']);

//Home Routes
$router->get('/', "Home#Install");



echo $router->run();