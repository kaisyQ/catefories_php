<?php

require_once(__DIR__ . "/./../bootstrap.php");


$categories = $em->getRepository(Category::class)->findAll();


function getCategoryNameAndURL ($category, &$url) {
    $parent = $category->getParent();
    $url = "/" . $category->getAlias() . $url ;
    if (!isset($parent)) {
        return;
    }
    getCategoryNameAndURL($parent, $url);
}

$res = [];

foreach($categories as $category) {
    $url = "";
    getCategoryNameAndURL($category, $url);
    $url = "\t" . $category->getName() . " " . $url . "\n";
    $res[] = $url;
}

file_put_contents(__DIR__."/./../categories.txt", $res);