<?php

namespace App;

use PDO;

class Db {
    private PDO $pdo;

    public function __construct () {
        $this->pdo = new PDO('mysql:host='.$_ENV['DATABASE_HOST'].';dbname='.$_ENV['DATABASE_NAME'], 
            $_ENV['DATABASE_USER'], 
            $_ENV['DATABASE_PASSWORD']
        );
    }

    public function query (string $sql, $params = []) : array {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}