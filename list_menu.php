<?php

$pdo = new PDO('mysql:host=localhost;dbname=categories', 'root', '99145673ffF');

// Выборка категорий первого уровня вложенности и их дочерних категорий
$stmt = $pdo->prepare("
    SELECT c1.name AS name1, c2.name AS name2
    FROM categories c1
    LEFT JOIN categories c2 ON c2.parent_id = c1.id
    WHERE c1.parent_id IS NULL
");
$stmt->execute();

// Обход каждой категории и формирование строки с отступами и названием
echo "<pre>";


$title = "";
while ($row = $stmt->fetch()) {
    
    $name1 = " " . $row['name1'];
    
    if ($name1 !== $title) {
        echo $name1 . "<br>";
        $title = $name1;
    } 
    $name2 = "\t" . $row['name2'] . "<br>";

    echo $name2;
    
}
echo "</pre>";