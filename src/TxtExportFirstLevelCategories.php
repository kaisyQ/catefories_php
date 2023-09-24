<?php

require_once(__DIR__ . "/./../bootstrap.php");

use App\Container;
use App\ExportFirstLevelCategoriesHandler;

$container = new Container();


$exprtFirstLevelCategoriesHandler = $container->get(ExportFirstLevelCategoriesHandler::class);

file_put_contents(__DIR__."/./../first_level_categories.txt", 
    $exprtFirstLevelCategoriesHandler->getMenuList()
);