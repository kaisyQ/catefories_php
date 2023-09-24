<?php

namespace App;

use PDO;

class CategoryRepository {

    public function getAll () {
        $pdo = new PDO('mysql:host=localhost;dbname=categories', 'root', '99145673ffF');
        $stmt = $pdo->prepare("SELECT * FROM categories");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById (int $id) {
        $pdo = new PDO('mysql:host=localhost;dbname=categories', 'root', '99145673ffF');
        $stmt = $pdo->prepare('SELECT id, name, alias, parent_id FROM Categories WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function save (CategoryDto $categoryDto) {
        $pdo = new PDO('mysql:host=localhost;dbname=categories', 'root', '99145673ffF');
        $stmt = $pdo->prepare("
            INSERT INTO CATEGORIES (id, name, alias, parent_id) VALUES
            (:id, :name, :alias, :parent_id); 
        ");

        $stmt->execute([
            'id' => $categoryDto->getId(),
            'name' => $categoryDto->getName(),
            'alias' => $categoryDto->getAlias(),
            'parent_id' => $categoryDto->getParentId()
        ]);
    }

}