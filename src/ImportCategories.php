<?php

require_once(__DIR__ . "/./../bootstrap.php");


$jsonData = file_get_contents(__DIR__ . "/./../categories.json");

$categories = json_decode($jsonData);

$categoryArray = [];

$pdo = new PDO('mysql:host=localhost;dbname=categories', 'root', '99145673ffF');

function importCategories($categories, &$categoryArray, $parent=null) {
    foreach($categories as $category) {

        $categ = [
            'id' => $category->id,
            'name' => $category->name,
            'alias' => $category->alias,
            'parent_id' => $parent
        ];

        
        $categoryArray[] = $categ;
        if (isset($category->childrens)) {
            importCategories($category->childrens, $categoryArray, $category->id);
        }
    }
}



importCategories($categories, $categoryArray);

foreach ($categoryArray as $categ) {
    $stmt = $pdo->prepare("
        INSERT INTO CATEGORIES (id, name, alias, parent_id) VALUES
        (:id, :name, :alias, :parent_id); 
    ");

    $stmt->execute([
        'id' => $categ['id'],
        'name' => $categ['name'],
        'alias' => $categ['alias'],
        'parent_id' => $categ['parent_id']
    ]);
}




