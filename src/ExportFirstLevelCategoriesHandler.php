<?php


namespace App;

use App\CategoryRepository;

class ExportFirstLevelCategoriesHandler {
    public function __construct (private CategoryRepository $repository) {
    }

    public function getMenuList() : array {
        
        $categoryList = $this->repository->getCategoryNameAndParentName();
        
        $namesResult = [];

        $tempParentCategoryName = "";

        foreach($categoryList->getItems() as $item) {

            $categoryName = $item->getCategoryName();
            $categoryParentName = $item->getCategoryParentName();

            if ($categoryParentName !== $tempParentCategoryName) {
                $namesResult[] = $categoryParentName . "\n";
                $tempParentCategoryName = $categoryParentName;
            } 

            $namesResult[] = "\t" . $categoryName . "\n";
        }   

        return $namesResult;

    }
}