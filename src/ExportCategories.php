<?php

namespace App;

require_once(__DIR__ . "/./../bootstrap.php");

use App\ExportCategoriesHandler;
use App\Container;

$expCategoriesHandler = (new Container())->get(ExportCategoriesHandler::class);

file_put_contents(__DIR__."/./../categories.txt", $expCategoriesHandler->getCategoriesPath());