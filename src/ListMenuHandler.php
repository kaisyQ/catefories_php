<?php


namespace App;
use App\CategoryRepository;


class ListMenuHandler {
    public function __construct (private CategoryRepository $repository) {} 

    public function getMenu ($parent_id = null, $indent = 0) {
           
        $categories = $this->repository->getByParentId($parent_id);


        foreach ($categories as $category) {
            $name = str_repeat(' ', $indent) . '- ' . $category['name'];
            echo $name . PHP_EOL;
            
            $this->getMenu($category['id'], $indent + 4);
        }   
           
    }

}