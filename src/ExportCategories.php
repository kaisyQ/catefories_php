<?php

namespace App;

require_once(__DIR__ . "/./../bootstrap.php");

use App\CategoryRepository;

$repository = new CategoryRepository();

function getCategoryPath($categoryId, $repository) {

    $category = $repository->getById($categoryId);
    
    if ($category) {
        $path = '/' . $category['alias'];
        if ($category['parent_id']) {
            $parentPath = getCategoryPath($category['parent_id'], $repository);
            if ($parentPath) {
                $path = $parentPath . $path;
            }
        }
    }
    return $path;
}

$categories = $repository->getAll();

$res = [];
foreach($categories as $category) {
    $categoryPath = getCategoryPath($category['id'], $repository);
    $res[] = $categoryPath . "\n";
}


file_put_contents(__DIR__."/./../categories.txt", $res);