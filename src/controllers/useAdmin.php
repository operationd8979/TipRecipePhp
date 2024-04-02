<?php
require_once './src/helpers/jwtFilter.php';
require_once './src/database/database.php';
require_once './src/models/Ingredient.php';
require_once './src/models/Type.php';
require_once './src/models/Disk.php';

function getDataIngredient(&$ingredients){
    doFilterInternal();
    $db = Database::getInstance()->getConnection();
    $ingredientModel = new Ingredient($db);
    $ingredients = $ingredientModel->getIngredients();
}

function getDataType(&$types){
    doFilterInternal();
    $db = Database::getInstance()->getConnection();
    $typeModel = new Type($db);
    $types = $typeModel->getTypes();
}

function getDisks(&$recipes, $search){
    doFilterInternal();
    $db = Database::getInstance()->getConnection();
    $diskModel = new Disk($db);
    $disks = $diskModel->getDisksAdmin($search);
    $recipes = $disks;
}


?>