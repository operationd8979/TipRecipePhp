<?php
require_once './src/helpers/jwtFilter.php';
require_once './src/services/ingredientService.php';
require_once './src/services/typeService.php';
require_once './src/services/dishService.php';

class HomeController{
    private $ingredientService;
    private $typeService;
    private $dishService;

    public function __construct(){
        $this->ingredientService = IngredientService::getInstance();
        $this->typeService = TypeService::getInstance();
        $this->dishService = DishService::getInstance();
    }

    public function invoke(&$dishs, &$ingredients, &$types, $itemsPerPage, $offset, &$tempDish){
        $user = doFilterInternal();
        $ingredients = $this->ingredientService->getIngredients();
        $types = $this->typeService->getTypes();
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $search = $_GET['search'] ?? '';
            $filterIngredientsByName = [];
            $filterTypesByName = [];
            $filterIngredients = [];
            $filterTypes = [];
            if(isset($_GET['ingredients'])){
                $filterIngredientsByName = explode(',', $_GET['ingredients']);
                for($i = 0; $i < count($filterIngredientsByName); $i++){
                    $filterIngredients[$i] = $ingredients[array_search($filterIngredientsByName[$i], array_column($ingredients, 'ingredientName'))]['ingredientID'];
                }
            }
            if(isset($_GET['types'])){
                $filterTypesByName = explode(',', $_GET['types']);
                for($i = 0; $i < count($filterTypesByName); $i++){
                    $filterTypes[$i] = $types[array_search($filterTypesByName[$i], array_column($types, 'typeName'))]['typeID'];
                }
            }
            $dishs = $this->dishService->getDishs($search, $filterIngredients, $filterTypes, $itemsPerPage, $offset);
            if(count($dishs) > 0){
                $this->dishService->implementRating($dishs, $user['userID']);
                $tempDish = $this->dishService->getDetailDishById($dishs[0]['dishID']);
            }
        }
    }

    public function invokeGetRecipe(){
        doFilterInternal();
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $dishId = $_GET['id'] ?? '';
            $dish = $this->dishService->getDetailDishById($dishId);
            echo(json_encode($dish));
        }
    }

    public function invokeDetail(&$dish){
        $user = doFilterInternal();
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $dishId = $_GET['id'] ?? '';
            $dish = $this->dishService->getDetailDishById($dishId);
            if(!$dish){
                header('Location: index.php');
                exit();
            }
            $rated = $this->dishService->getRatingUserOfDish($dishId,$user['userID']);
            $dish['rating'] = $rated?$rated[0]['rating']*10:'Not yet';
            if(isset($_GET['rating'])){
                $newRating = $_GET['rating'];
                $this->dishService->rateDish($dishId, $newRating, $user['userID']);
                $dish['rating'] = $newRating;
            }
        }
    }

    public function invokeBanner(&$dishs){
        $user = doFilterInternal();
        $dishs = $this->dishService->getRecommendDishsByUser($user['userID']);
    }


}


function renderRecipce($dishs){
    if(count($dishs) === 0){
        echo('<p class="text-center text-xl">No recipe found</p>');
    }
    foreach($dishs as $dish){
        echo('<li class="mb-4">');
        echo('<div class="flex justify-between">');
        echo('<h3 class="text-xl font-semibold">'.$dish['dishName'].'</h3>');
        if($dish['isRated'])
            echo('<p class="text-red-600">Your rating: '.$dish['rating']*10 .'/10</p>');
        else{
            // echo('<p class="text-red-600">Predicted rating: '.$dish['preRating']*10 .'/10</p>');
            if($dish['preRating']*10 > 7)
                echo('<p class="text-red-600">Có thể bạn sẽ thích</p>');
            else
                echo('<p class="text-red-600">Not rated yet</p>');
        }
        echo('</div>');
        echo('<div class="flex">');
        echo('<img src="'.$dish['url'].'" alt="Recipe 1" class="w-32 h-32 object-cover rounded-lg">');
        echo('<div class="ml-2">');
        echo('<p class="text-gray-600">Description: '.$dish['summary'].'</p>');
        echo('<p class="text-gray-600">Ingredients: ');
        $ingredients = explode(',', $dish['ingredients']);
        foreach($ingredients as $ingredient){
            echo('<span class="inline-block bg-gray-200 text-gray-700 rounded-full px-2 py-0.3 mr-1 text-sm font-semibold">'.$ingredient.'</span>');
        }
        echo('</p>');
        echo('<p class="text-gray-600">Types: ');
        $types = explode(',', $dish['types']);
        foreach($types as $type){
            echo('<span class="inline-block bg-red-200 text-gray-700 rounded-full px-2 py-0.3 mr-1 text-sm font-semibold">'.$type.'</span>');
        }
        echo('</p>');
        echo('<a href="detail.php?id='.$dish['dishID'].'" class="text-blue-500 hover:underline">View Recipe</a>');
        echo('<br>');
        echo('<a href="javascript:void(0)" onClick="quickView(\''.$dish['dishID'].'\')" class="text-blue-500 hover:underline">Quick View</a>');

        echo('</div>');
        echo('</div>');
        echo('</li>');
    }
}


?>