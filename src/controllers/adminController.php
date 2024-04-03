<?php
require_once './src/helpers/jwtFilter.php';
require_once './src/services/ingredientService.php';
require_once './src/services/typeService.php';
require_once './src/services/dishService.php';
require_once './src/services/userService.php';

class AdminController{
    private $ingredientService;
    private $typeService;
    private $dishService;
    private $userService;
    
    public function __construct(){
        $this->ingredientService = IngredientService::getInstance();
        $this->typeService = TypeService::getInstance();
        $this->dishService = DishService::getInstance();
        $this->userService = UserService::getInstance();
    }

    public function invokeDashboard(){
        doFilterInternal();
    }

    public function invokeDishManage(&$dishs){
        doFilterInternal();
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $search = $_GET['search'] ?? '';
        }
        $dishs = $this->dishService->getDishsAdmin($search);
    }

    public function invokeModifyDish(&$ingredients, &$types, &$dish){
        doFilterInternal();
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $dishId = $_GET['id'] ?? '';
            $dish = $this->dishService->getDishById($dishId);
            $ingredients = $this->ingredientService->getIngredients();
            $types = $this->typeService->getTypes();
        }
        
    }

    public function invokeUserManage(){
        doFilterInternal();
    }

}



?>