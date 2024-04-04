<?php

class Dish {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getDishs($search, $ingredients, $types, $itemsPerPage, $offset) {
        $query = "SELECT d.dishID, d.dishName, d.summary, d.url, GROUP_CONCAT(DISTINCT i.ingredientName) as ingredients, GROUP_CONCAT(DISTINCT t.typeName) as types
        FROM `dishs` d
        JOIN `dishingredients` di ON d.dishID = di.dishID
        JOIN `ingredients` i ON di.ingredientID = i.ingredientID
        JOIN `dishtypes` dt ON d.dishID = dt.dishID
        JOIN `typedishs` t ON dt.typeID = t.typeID
        WHERE d.isDelete = 0
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
        $query .= " LIMIT :itemsPerPage OFFSET :offset";
        $stmt = $this->db->prepare($query);
        $searchPattern = "%$search%";
        $stmt->bindParam(':search', $searchPattern, PDO::PARAM_STR);
        $stmt->bindParam(':itemsPerPage', $itemsPerPage, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
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
        WHERE d.isDelete = 0
        GROUP BY d.dishID
        Having d.dishName LIKE :search
        OR d.dishID LIKE :search";
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


    // SELECT d.dishID, d.dishName, d.summary, d.url, GROUP_CONCAT(DISTINCT i.ingredientName ,'@', di.amount,'@', di.unit) as ingredients, GROUP_CONCAT(DISTINCT t.typeName) as types, r.content
    // FROM `dishs` d 
    // JOIN `dishingredients` di ON d.dishID = di.dishID
    // JOIN `ingredients` i ON di.ingredientID = i.ingredientID
    // JOIN `dishtypes` dt ON d.dishID = dt.dishID
    // JOIN `typedishs` t ON dt.typeID = t.typeID
    // JOIN `recipes` r ON d.dishID = r.dishID
    // GROUP BY d.dishID
    // HAVING d.dishID = "Test01" 
    public function getDetailDishById($dishID) {
        $query = "SELECT d.dishID, d.dishName, d.summary, d.url, GROUP_CONCAT(DISTINCT i.ingredientName ,'@', di.amount,'@', di.unit) as ingredients, GROUP_CONCAT(DISTINCT t.typeName) as types, r.content
        FROM `dishs` d 
        JOIN `dishingredients` di ON d.dishID = di.dishID
        JOIN `ingredients` i ON di.ingredientID = i.ingredientID
        JOIN `dishtypes` dt ON d.dishID = dt.dishID
        JOIN `typedishs` t ON dt.typeID = t.typeID
        JOIN `recipes` r ON d.dishID = r.dishID
        GROUP BY d.dishID
        HAVING d.dishID = :dishID";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':dishID' => $dishID));
        $dishs = $stmt->fetch(PDO::FETCH_ASSOC);
        return $dishs;
    }

    public function addDish($dishName, $summary, $recipe, $ingredients, $types) {
        $rand = rand(100000, 999999);
        $dishID = uniqid().$rand;
        $query = "INSERT INTO dishs (dishID, dishName, summary) VALUES (:dishID, :dishName, :summary)";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':dishID' => $dishID, ':dishName' => $dishName, ':summary' => $summary));
        $query = "INSERT INTO recipes (dishID, content) VALUES (:dishID, :content)";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':dishID' => $dishID, ':content' => $recipe));
        foreach ($ingredients as $ingredient) {
            $query = "INSERT INTO dishingredients (dishID, ingredientID, amount, unit) VALUES (:dishID, :ingredientID, :amount, :unit)";
            $stmt = $this->db->prepare($query);
            $stmt->execute(array(':dishID' => $dishID, ':ingredientID' => $ingredient['id'], ':amount' => $ingredient['amount'], ':unit' => $ingredient['unit']));
        }
        foreach ($types as $type) {
            $query = "INSERT INTO dishtypes (dishID, typeID) VALUES (:dishID, :typeID)";
            $stmt = $this->db->prepare($query);
            $stmt->execute(array(':dishID' => $dishID, ':typeID' => $type));
        }
        return $dishID;
    }

    public function updateDishUrl($dishID, $url) {
        $query = "UPDATE dishs SET url = :url WHERE dishID = :dishID";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':dishID' => $dishID, ':url' => $url));
    }

    public function modifyDish($id, $dishName, $summary, $recipe, $ingredients, $types) {
        //chưa check
        $query = "UPDATE dishs SET dishName = :dishName, summary = :summary WHERE dishID = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':id' => $id, ':dishName' => $dishName, ':summary' => $summary));
        $query = "UPDATE recipes SET content = :content WHERE dishID = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':id' => $id, ':content' => $recipe));
        $query = "DELETE FROM dishingredients WHERE dishID = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':id' => $id));
        foreach ($ingredients as $ingredient) {
            $query = "INSERT INTO dishingredients (dishID, ingredientID, amount, unit) VALUES (:dishID, :ingredientID, :amount, :unit)";
            $stmt = $this->db->prepare($query);
            $stmt->execute(array(':dishID' => $id, ':ingredientID' => $ingredient['id'], ':amount' => $ingredient['amount'], ':unit' => $ingredient['unit']));
        }
        $query = "DELETE FROM dishtypes WHERE dishID = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':id' => $id));
        foreach ($types as $type) {
            $query = "INSERT INTO dishtypes (dishID, typeID) VALUES (:dishID, :typeID)";
            $stmt = $this->db->prepare($query);
            $stmt->execute(array(':dishID' => $id, ':typeID' => $type));
        }
    }

    public function deleteDish($dishID) {
        $query = "UPDATE dishs SET isDelete = 1 WHERE dishID = :dishID";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':dishID' => $dishID));
    }

}
?>