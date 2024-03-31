<?php

class Ingredient {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getIngredients() {
        $query = "SELECT * FROM ingredients";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $ingredients = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $ingredients;
    }

    public function getIngredientById($ingredientID) {
        $query = "SELECT * FROM ingredients WHERE ingredientID = :ingredientID";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':ingredientID' => $ingredientID));
        $ingredients = $stmt->fetch(PDO::FETCH_ASSOC);
        return $ingredients;
    }

    public function createIngredient($ingredientName) {
        $rand = rand(100000, 999999);
        $ingredientID = uniqid().$rand;
        $query = "INSERT INTO ingredients (ingredientID, ingredientName) VALUES (:ingredientID, :ingredientName)";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':ingredientID' => $ingredientID, ':ingredientName' => $ingredientName));
    }

    public function updateIngredient($ingredientID, $ingredientName) {
        $query = "UPDATE ingredients SET ingredientName = :ingredientName WHERE ingredientID = :ingredientID";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':ingredientID' => $ingredientID, ':ingredientName' => $ingredientName));
    }

}


?>