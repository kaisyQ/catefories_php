<?php

namespace App;

use PDO;

class Db {
    private PDO $pdo;

    public function __construct () {
        $this->pdo = new PDO('mysql:host=localhost;dbname=categories', 'root', '99145673ffF');
    }

    public function query (string $sql, $params = []) : array {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}