<?php

namespace App;

use App\CategoryRepository;
use App\CategoryDto;

class ImportCategoriesHandler {
    private CategoryRepository $repository;

    public function __construct () {
        $this->repository = new CategoryRepository();
    }

    public function importCategories($categories, $parent=null) {
        $categoryArray = [];
        foreach($categories as $category) { 
 
            $categoryDto = new CategoryDto($category->id, $category->name, $category->alias, $parent); 
            
            $categoryArray[] = $categoryDto; 
    
            if (isset($category->childrens)) {
                $id = $categoryDto->getId();
                $childCategories = $this->importCategories($category->childrens, $id); 
                $categoryArray = array_merge($categoryArray, $childCategories);
            } 
 
        }
        return $categoryArray;
    }

    public function insertCategoriesFromJsonToDb (string $filePath) {
        $jsonData = file_get_contents($filePath);

        $categories = json_decode($jsonData);

        $categoryArray = $this->importCategories($categories); 
 
        foreach ($categoryArray as $categoryDto) { 
            $this->repository->save($categoryDto); 
        }
    }


}