<?php
require_once './src/database/database.php';
require_once './src/models/Ingredient.php';

class IngredientService{
    private $db;
    private $ingredientModel;
    public static $instance = null;

    public function __construct(){
        $this->db = Database::getInstance()->getConnection();
        $this->ingredientModel = new Ingredient($this->db);
    }

    public static function getInstance(){
        if (!self::$instance) {
            self::$instance = new IngredientService();
        }
        return self::$instance;
    }

    public function getIngredients(){
        return $this->ingredientModel->getIngredients();
    }

}

?>