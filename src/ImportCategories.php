<?php

namespace App;

require_once(__DIR__ . "/./../bootstrap.php");

use App\CategoryDto;

$jsonData = file_get_contents(__DIR__ . "/./../categories.json");

$categories = json_decode($jsonData);

$categoryArray = [];

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
    $stmt = $pdo->prepare("
        INSERT INTO CATEGORIES (id, name, alias, parent_id) VALUES
        (:id, :name, :alias, :parent_id); 
    ");

    $stmt->execute([
        'id' => $categoryDto->getId(),
        'name' => $categoryDto->getName(),
        'alias' => $categoryDto->getAlias(),
        'parent_id' => $categoryDto->getParentId()
    ]);
}




