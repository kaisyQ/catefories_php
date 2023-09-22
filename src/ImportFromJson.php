<?php

require __DIR__ . '/Category.php';

require_once(__DIR__ . "/./../bootstrap.php");
/*
$jsonData = file_get_contents(__DIR__ . "/./../categories.json");

$categories = json_decode($jsonData);

$categoryArray = [];

function importCategories($categories, &$categoryArray, $parent=null) {
    foreach($categories as $category) {


        $categorydto = new Category();
        $categorydto->setId($category->id);
        $categorydto->setName($category->name);
        $categorydto->setAlias($category->alias);
        $categorydto->setParent($parent);

        $categoryArray[] = $categorydto;
        if (isset($category->childrens)) {
            importCategories($category->childrens, $categoryArray, $categorydto);
        }
    }
}

importCategories($categories, $categoryArray);



foreach ($categoryArray as $categ) {
    $em->persist($categ);
}
$em->flush();

*/
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

