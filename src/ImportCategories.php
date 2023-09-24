<?php

namespace App;

require_once(__DIR__ . "/./../bootstrap.php");

use App\CategoryDto;

$jsonData = file_get_contents(__DIR__ . "/./../categories.json");

$categories = json_decode($jsonData);

$categoryArray = [];

$repository = new CategoryRepository();

function importCategories($categories, &$categoryArray, $parent=null) {
    foreach($categories as $category) {

        $categoryDto = new CategoryDto($category->id, $category->name, $category->alias, $parent);
        
        $categoryArray[] = $categoryDto;

        if (isset($category->childrens)) {
            importCategories($category->childrens, $categoryArray, $categoryDto->getId());
        }

    }
}



importCategories($categories, $categoryArray);

foreach ($categoryArray as $categoryDto) {
    $repository->save($categoryDto);
}




