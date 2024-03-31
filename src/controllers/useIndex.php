<?php
require_once './src/helpers/jwtFilter.php';
require_once './src/database/database.php';
require_once './src/models/Ingredient.php';
require_once './src/models/Type.php';
require_once './src/models/Disk.php';

function getUserInfo(){
    $user = doFilterInternal();
    return $user;
}


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

function getDisks(&$recipes, $search, $ingredients, $types){
    doFilterInternal();
    $db = Database::getInstance()->getConnection();
    $diskModel = new Disk($db);
    $disks = $diskModel->getDisks($search, $ingredients, $types);
    $recipes = $disks;
}

function renderRecipce($recipes){
    foreach($recipes as $recipe){
        echo('<li class="mb-4">');
        echo('<h3 class="text-xl font-semibold">'.$recipe['diskName'].'</h3>');
        echo('<div class="flex">');
        echo('<img src="'.$recipe['url'].'" alt="Recipe 1" class="w-32 h-32 object-cover rounded-lg">');
        echo('<div class="ml-2">');
        echo('<p class="text-gray-600">Description: '.$recipe['summary'].'</p>');
        echo('<p class="text-gray-600">Ingredients: ');
        $ingredients = explode(',', $recipe['ingredients']);
        foreach($ingredients as $ingredient){
            echo('<span class="inline-block bg-gray-200 text-gray-700 rounded-full px-2 py-0.3 mr-1 text-sm font-semibold">'.$ingredient.'</span>');
        }
        echo('</p>');
        echo('<p class="text-gray-600">Types: ');
        $types = explode(',', $recipe['types']);
        foreach($types as $type){
            echo('<span class="inline-block bg-red-200 text-gray-700 rounded-full px-2 py-0.3 mr-1 text-sm font-semibold">'.$type.'</span>');
        }
        echo('</p>');
        echo('<a href="recipe.php?id='.$recipe['diskID'].'" class="text-blue-500 hover:underline">View Recipe</a>');
        echo('</div>');
        echo('</div>');
        echo('</li>');
    }
}


?>