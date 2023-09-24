<?php

namespace App;

use App\CategoryRepository;

class ExportCategoriesHandler {
    private $repository;

    public function __construct () {
        $this->repository = new CategoryRepository();
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

    public function getCateriesPath () {


        $categories = $this->repository->getAll();

        $res = [];
        foreach($categories as $category) {
            $categoryPath = $this->getCategoryPath($category['id']);
            $res[] = $categoryPath . "\n";
        }
        return $res;
    }
}