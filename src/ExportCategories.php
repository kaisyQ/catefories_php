<?php

namespace App;

require_once(__DIR__ . "/./../bootstrap.php");

use App\ExportCategoriesHandler;

$expCategoriesHandler = new ExportCategoriesHandler();

file_put_contents(__DIR__."/./../categories.txt", $expCategoriesHandler->getCateriesPath());