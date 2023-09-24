<?php

require_once(__DIR__ . "/vendor/autoload.php");

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


require_once(__DIR__ . "/src/Db.php");

require_once(__DIR__ . "/src/CategoryRepository.php");

require_once(__DIR__ . "/src/ExportCategoriesHandler.php");

require_once(__DIR__ . "/src/ImportCategoriesHandler.php");

require_once(__DIR__ . "/src/ListMenuHandler.php");
