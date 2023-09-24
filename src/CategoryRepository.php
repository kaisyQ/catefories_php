<?php

namespace App;

use App\CategoryListItemDto;
use App\Category;
use App\CategoryListDto;
class CategoryRepository {

    public function __construct(private Db $db) {}
    public function getAll () {
        return $this->db->query("SELECT * FROM categories");
    }

    public function getById (int $id) {
        return $this->db->query("SELECT id, name, alias, parent_id FROM Categories WHERE id = ?", [$id])[0];
    }

    public function getByParentId(?int $parentId) {
        if (!isset($parentId)) {
            return $this->db->query("SELECT id, name, alias, parent_id FROM Categories WHERE parent_id IS NULL");
        } else {
            return $this->db->query("SELECT id, name, alias, parent_id FROM Categories WHERE parent_id = ?",  [$parentId]);
        }
    }

    public function save (Category $category) {
        return $this->db->query("
            INSERT INTO CATEGORIES (id, name, alias, parent_id) VALUES
            (:id, :name, :alias, :parent_id); 
        ", [
            'id' => $category->getId(),
            'name' => $category->getName(),
            'alias' => $category->getAlias(),
            'parent_id' => $category->getParentId()
        ]);
    }

    public function getCategoryNameAndParentName () {
        $queryResult = $this->db->query("
            SELECT c1.name AS name1, c2.name AS name2
            FROM categories c1
            LEFT JOIN categories c2 ON c2.parent_id = c1.id
            WHERE c1.parent_id IS NULL
        ");

        return new CategoryListDto(array_map( 
            fn($row) => new CategoryListItemDto($row['name2'], $row['name1']),
            $queryResult
        ));
    }

}