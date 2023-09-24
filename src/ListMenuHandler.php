<?php


namespace App;

use App\CategoryRepository;

class ListMenuHandler {
    public function __construct (private CategoryRepository $repository) {
    }

    public function getMenuList() : void {
        
        $categoryList = $this->repository->getCategoryNameAndParentName();
        
        $tempParentCategoryName = "";

        foreach($categoryList->getItems() as $item) {
                
            $categoryName = $item->getCategoryName();
            $categoryParentName = $item->getCategoryParentName();

            if ($categoryParentName !== $tempParentCategoryName) {
                echo " " . $categoryParentName . "<br>";
                $tempParentCategoryName = $categoryParentName;
            } 
        
            echo "\t" . $categoryName . "<br>";
        }   

    }
}