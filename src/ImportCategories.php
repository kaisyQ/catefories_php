<?php

namespace App;

require_once(__DIR__ . "/./../bootstrap.php");

use App\ImportCategoriesHandler;

use App\Container;

$impCategoriesHandler = (new Container)->get(ImportCategoriesHandler::class);

$impCategoriesHandler->insertCategoriesFromJsonToDb(__DIR__ . "/./../categories.json");

