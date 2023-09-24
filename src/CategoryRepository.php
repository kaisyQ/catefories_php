<?php

namespace App;

class CategoryRepository {

    public function __construct(private Db $db) {}
    public function getAll () {
        return $this->db->query("SELECT * FROM categories");
    }

    public function getById (int $id) {
        return $this->db->query("SELECT id, name, alias, parent_id FROM Categories WHERE id = ?", [$id])[0];
    }

    public function save (CategoryDto $categoryDto) {
        return $this->db->query("
            INSERT INTO CATEGORIES (id, name, alias, parent_id) VALUES
            (:id, :name, :alias, :parent_id); 
        ", [
            'id' => $categoryDto->getId(),
            'name' => $categoryDto->getName(),
            'alias' => $categoryDto->getAlias(),
            'parent_id' => $categoryDto->getParentId()
        ]);
    }

}