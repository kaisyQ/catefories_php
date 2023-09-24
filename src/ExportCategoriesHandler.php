<?php

namespace App;

use App\CategoryRepository;

class ExportCategoriesHandler {
    public function __construct (private CategoryRepository $repository) {
    
    }
    public function getCategoryPath($categoryId) {

        $category = $this->repository->getById($categoryId);
        
        if ($category) {
            $path = '/' . $category['alias'];
            if ($category['parent_id']) {
                $parentPath = $this->getCategoryPath($category['parent_id']);
                if ($parentPath) {
                    $path = $parentPath . $path;
                }
            }
        }
        return $path;
    }

    public function getCategoriesPath () {
        $categories = $this->repository->getAll();

        $res = [];
        foreach($categories as $category) {
            $categoryPath = $this->getCategoryPath($category['id']);
            $res[] = $categoryPath . "\n";
        }
        return $res;
    }
}