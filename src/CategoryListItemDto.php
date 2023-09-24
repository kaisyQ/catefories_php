<?php

namespace App;
class CategoryListItemDto {
    private string $categoryName;
    private ?string $categoryParentName = null;

    public function __construct (string $categoryName, ?string $categoryParentName=null) {
        $this->categoryName = $categoryName;
        $this->categoryParentName = $categoryParentName;
    }

    public function setCategoryName (string $categoryName) : self {
        $this->categoryName = $categoryName;
        return $this;
    }

    public function getCategoryName () : string {
        return $this->categoryName;
    }


    public function setCategoryParentName (?string $categoryParentName) : self {
        $this->categoryParentName = $categoryParentName;
        return $this;
    }

    public function getCategoryParentName () : ?string {
        return $this->categoryParentName;
    }

}