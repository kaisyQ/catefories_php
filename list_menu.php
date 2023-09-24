<?php

use App\Container;

use App\ListMenuHandler;

require_once(__DIR__ . "/./bootstrap.php"); 


echo "<pre>";

$container  = new Container();

$listMenuHandler = $container->get(ListMenuHandler::class);

$listMenuHandler->getMenu();


echo "</pre>";
