<?php
require_once './src/database/database.php';
require_once './src/models/Dish.php';

class DishService{
    private $db;
    private $dishModel;
    public static $instance = null;

    private function __construct(){
        $this->db = Database::getInstance()->getConnection();
        $this->dishModel = new Dish($this->db);
    }

    public static function getInstance(){
        if (!self::$instance) {
            self::$instance = new DishService();
        }
        return self::$instance;
    }

    public function getDishs($search, $ingredients, $types, $itemsPerPage, $offset){
        return $this->dishModel->getDishs($search, $ingredients, $types, $itemsPerPage, $offset);
    }

    public function getDishsAdmin($search){
        return $this->dishModel->getDishsAdmin($search);
    }

    public function getDishById($dishId){
        return $this->dishModel->getDishById($dishId);
    }

    public function getDetailDishById($dishId){
        return $this->dishModel->getDetailDishById($dishId);
    }

    public function addDish($dishName, $summary, $recipe, $ingredients, $types){
        return $this->dishModel->addDish($dishName, $summary, $recipe, $ingredients, $types);
    }

    public function updateDishUrl($id, $url){
        return $this->dishModel->updateDishUrl($id, $url);
    }

    public function modifyDish($id, $dishName, $summary, $recipe, $ingredients, $types){
        return $this->dishModel->modifyDish($id, $dishName, $summary, $recipe, $ingredients, $types);
    }

    public function deleteDish($id){
        return $this->dishModel->deleteDish($id);
    }

}

?>