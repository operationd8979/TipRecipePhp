<?php
require_once './src/helpers/jwtFilter.php';
require_once './src/services/ingredientService.php';
require_once './src/services/typeService.php';
require_once './src/services/dishService.php';
require_once './src/services/userService.php';
require_once './src/services/firebaseService.php';

class AdminController{
    private $ingredientService;
    private $typeService;
    private $dishService;
    private $userService;
    private $firebaseService;
    
    public function __construct(){
        $this->ingredientService = IngredientService::getInstance();
        $this->typeService = TypeService::getInstance();
        $this->dishService = DishService::getInstance();
        $this->userService = UserService::getInstance();
        $this->firebaseService = FirebaseService::getInstance();
    }

    public function invokeDashboard(){
        doFilterInternal();
    }

    public function invokeDishManage(&$dishs){
        doFilterInternal();
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $search = $_GET['search'] ?? '';
            if(isset($_GET['delete'])){
                $this->dishService->deleteDish($_GET['delete']);
            }
        }
        $dishs = $this->dishService->getDishsAdmin($search);
    }

    public function invokeEditDish(&$ingredients, &$types, &$dish){
        doFilterInternal();
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $dishId = $_GET['id'] ?? '';
            $dish = $this->dishService->getDetailDishById($dishId);
            $ingredients = $this->ingredientService->getIngredients();
            $types = $this->typeService->getTypes();
        }
        
    }

    public function invokeUserManage(){
        doFilterInternal();
    }

    public function invokeModifyDish(){
        $user = doFilterInternal();
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = $_POST["id"];
            $dishName = $_POST["dishName"];
            $summary = $_POST["summary"];
            $recipe = $_POST["recipe"];

            $ingredients = json_decode($_POST["ingredients"], true);
            $types = json_decode($_POST["types"], true);

            $INGREDIENTS = $this->ingredientService->getIngredients();
            $TYPES = $this->typeService->getTypes();

            for($i = 0; $i < count($ingredients); $i++){
                $ingredients[$i]['id'] = $INGREDIENTS[array_search($ingredients[$i]['name'], array_column($INGREDIENTS, 'ingredientName'))]['ingredientID'];
            }
            for($i = 0; $i < count($types); $i++){
                $types[$i] = $TYPES[array_search($types[$i], array_column($TYPES, 'typeName'))]['typeID'];
            }
            
            if($id === ''){
                $id = $this->dishService->addDish($dishName, $summary, $recipe, $ingredients, $types);
            }else{
                $this->dishService->updateDish($id, $dishName, $summary, $recipe, $ingredients, $types);
            }

            if (isset($_FILES["file"]) && $_FILES["file"]["error"] === UPLOAD_ERR_OK) {
                $tempFilePath = $_FILES["file"]["tmp_name"];
                $originalFileName = $_FILES["file"]["name"];
                $uploadDirectory = "tipRecipe/dishs/";
                $targetFilePath = $uploadDirectory . $id . '.' . pathinfo($originalFileName, PATHINFO_EXTENSION);
                $bucket = $this->firebaseService->getStorage()->getBucket();
                $fileUpload = $bucket->upload(
                    fopen($tempFilePath, 'r'),
                    ['name' => $targetFilePath]
                );
                $token = '8501af01-75bf-420f-a7ee-4bd5ef5f4bba';
                $url = "https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/".urlencode($targetFilePath).'?alt=media&token='.$token;
                $this->dishService->updateDishUrl($id, $url);
            }
            echo("success");
        }
        else{
            echo("fail");
        }
    }

}



?>