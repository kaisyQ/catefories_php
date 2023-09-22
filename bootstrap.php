<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\DriverManager;


require_once(__DIR__ . "/vendor/autoload.php");


$devMode = true;

$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . '/src'), $devMode);



$connection = DriverManager::getConnection([
    'driver' => 'pdo_mysql',
    'host' => 'localhost',
    'port' => '3306',
    'dbname' => 'categories',
    'user' => 'root',
    'password' => '99145673ffF',
], $config);


$em = new EntityManager($connection, $config);
