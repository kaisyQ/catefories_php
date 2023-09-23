<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\DriverManager;


require_once(__DIR__ . "/vendor/autoload.php");


$devMode = true;
$paths = array(__DIR__ . "/src");

$config = Setup::createAnnotationMetadataConfiguration($paths, $devMode);

$connection = DriverManager::getConnection([
    'driver' => 'pdo_mysql',
    'host' => 'localhost',
    'port' => '3306',
    'dbname' => 'categories',
    'user' => 'root',
    'password' => '99145673ffF',
], $config);


$em = new EntityManager($connection, $config);
