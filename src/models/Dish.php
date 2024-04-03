<?php

class Dish {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getDishs($search, $ingredients, $types) {
        $query = "SELECT d.dishID, d.dishName, d.summary, d.url, GROUP_CONCAT(DISTINCT i.ingredientName) as ingredients, GROUP_CONCAT(DISTINCT t.typeName) as types
        FROM `dishs` d
        JOIN `dishingredients` di ON d.dishID = di.dishID
        JOIN `ingredients` i ON di.ingredientID = i.ingredientID
        JOIN `dishtypes` dt ON d.dishID = dt.dishID
        JOIN `typedishs` t ON dt.typeID = t.typeID
        GROUP BY d.dishID
        Having d.dishName LIKE :search";
        if (count($ingredients) > 0) {
            $query .= " and d.dishID IN (SELECT dishID FROM dishingredients WHERE ingredientID IN (";
            $query .= implode(",", $ingredients);
            $query .= ")
            GROUP BY dishID
            HAVING COUNT(DISTINCT ingredientID) = ";
            $query .= count($ingredients);
            $query .= ")";
        }
        if (count($types) > 0) {
            $query .= " and d.dishID IN (SELECT dishID FROM dishtypes WHERE typeID IN (";
            $query .= implode(",", $types);
            $query .= "))";
        }
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':search' => "%$search%"));
        $dishs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $dishs;
    }

    public function getDishsAdmin($search) {
        $query = "SELECT d.dishID, d.dishName, d.summary, d.url, GROUP_CONCAT(DISTINCT i.ingredientName) as ingredients, GROUP_CONCAT(DISTINCT t.typeName) as types
        FROM `dishs` d
        JOIN `dishingredients` di ON d.dishID = di.dishID
        JOIN `ingredients` i ON di.ingredientID = i.ingredientID
        JOIN `dishtypes` dt ON d.dishID = dt.dishID
        JOIN `typedishs` t ON dt.typeID = t.typeID
        GROUP BY d.dishID
        Having d.dishName LIKE :search";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':search' => "%$search%"));
        $dishs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $dishs;
    }

    public function getDishById($dishID) {
        $query = "SELECT * FROM dishs WHERE dishID = :dishID";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':dishID' => $dishID));
        $dishs = $stmt->fetch(PDO::FETCH_ASSOC);
        return $dishs;
    }

}
?>