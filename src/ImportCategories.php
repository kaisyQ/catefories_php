<?php

namespace App;

require_once(__DIR__ . "/./../bootstrap.php");

use App\ImportCategoriesHandler;

$impCategoriesHandler = new ImportCategoriesHandler();

$impCategoriesHandler->insertCategoriesFromJsonToDb(__DIR__ . "/./../categories.json");

