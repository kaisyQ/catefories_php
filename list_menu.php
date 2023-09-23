<?php

require_once(__DIR__ . "/./bootstrap.php"); 

$stmt = $pdo->prepare("
    SELECT c1.name AS name1, c2.name AS name2
    FROM categories c1
    LEFT JOIN categories c2 ON c2.parent_id = c1.id
    WHERE c1.parent_id IS NULL
");

$stmt->execute();

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