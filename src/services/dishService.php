<?php
require_once './src/database/database.php';
require_once './src/models/Dish.php';

class DishService{
    private $db;
    private $dishModel;
    public static $instance = null;

    public function __construct(){
        $this->db = Database::getInstance()->getConnection();
        $this->dishModel = new Dish($this->db);
    }

    public static function getInstance(){
        if (!self::$instance) {
            self::$instance = new DishService();
        }
        return self::$instance;
    }

    public function getDishs($search, $ingredients, $types){
        return $this->dishModel->getDishs($search, $ingredients, $types);
    }

    public function getDishsAdmin($search){
        return $this->dishModel->getDishsAdmin($search);
    }

    public function getDishById($dishId){
        return $this->dishModel->getDishById($dishId);
    }

}

?>