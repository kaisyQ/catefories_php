<?php

require_once(__DIR__ . "/./../bootstrap.php");


function getCategoryPath($categoryId, $pdo) {
    $path = '';
    $stmt = $pdo->prepare('SELECT id, name, alias, parent_id FROM Categories WHERE id = ?');
    $stmt->execute([$categoryId]);
    $category = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($category) {
        $path = '/' . $category['alias'];
        if ($category['parent_id']) {
            $parentPath = getCategoryPath($category['parent_id'], $pdo);
            if ($parentPath) {
                $path = $parentPath . $path;
            }
        }
    }
    return $path;
}

$pdo = new PDO('mysql:host=localhost;dbname=categories', 'root', '99145673ffF');
$stmt = $pdo->prepare("SELECT * FROM categories");

$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

$res = [];
foreach($categories as $category) {
    $categoryPath = getCategoryPath($category['id'], $pdo);
    $res[] = $categoryPath . "\n";
}


file_put_contents(__DIR__."/./../categories.txt", $res);