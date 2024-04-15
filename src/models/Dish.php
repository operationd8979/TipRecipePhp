<?php

class Dish {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getCount($search) {
        $query = "SELECT COUNT(*) as total FROM dishs WHERE dishName LIKE :search";
        $stmt = $this->db->prepare($query);
        $searchPattern = "%$search%";
        $stmt->bindParam(':search', $searchPattern, PDO::PARAM_STR);
        $stmt->execute();
        $total = $stmt->fetch(PDO::FETCH_ASSOC);
        return $total['total'];
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

    public function getDishsAdmin($search, $offset, $itemsPerPage) {
        $query = "SELECT d.dishID, d.dishName, d.summary, d.url, GROUP_CONCAT(DISTINCT i.ingredientName) as ingredients, GROUP_CONCAT(DISTINCT t.typeName) as types
        FROM `dishs` d
        JOIN `dishingredients` di ON d.dishID = di.dishID
        JOIN `ingredients` i ON di.ingredientID = i.ingredientID
        JOIN `dishtypes` dt ON d.dishID = dt.dishID
        JOIN `typedishs` t ON dt.typeID = t.typeID
        WHERE d.isDelete = 0
        GROUP BY d.dishID
        Having d.dishName LIKE :search
        OR d.dishID LIKE :search
        LIMIT :itemsPerPage OFFSET :offset";
        $stmt = $this->db->prepare($query);
        $searchPattern = "%$search%";
        $stmt->bindParam(':search', $searchPattern, PDO::PARAM_STR);
        $stmt->bindParam(':itemsPerPage', $itemsPerPage, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $dishs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $dishs;
    }


    public function getRating(){
        $query = "SELECT u.userID, d.dishID, COALESCE(r.rating, d.avgRating) AS rating
        FROM users u
        CROSS JOIN dishs d
        LEFT JOIN ratings r ON r.userID = u.userID AND r.dishID = d.dishID
        ORDER BY d.dishID, u.userID";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $ratings = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $ratings;
    }

    public function getAverageRating() {
        $query = "SELECT `dishID`, `avgRating` FROM `dishs` ORDER BY `dishID`";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $ratings = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $ratings;
    }

    public function getRatingUserOfDish($dishID, $userID) {
        $query = "SELECT dishID, rating, predictedRating as preRating, predictionTime as preRatingTime FROM ratings WHERE userID = :userID AND dishID = :dishID";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':userID' => $userID, ':dishID' => $dishID));
        $ratings = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $ratings;
    }

    public function getRatingUserOfDishs($dishIDs, $userID) {
        $query = "SELECT dishID, rating, predictedRating as preRating, predictionTime as preRatingTime FROM ratings WHERE userID = :userID AND dishID IN (";
        for($i = 0; $i < count($dishIDs); $i++) {
            $query .= "\"$dishIDs[$i]\"";
            if ($i < count($dishIDs) - 1)
                $query .= ", ";
        }
        $query .= ")";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':userID' => $userID));
        $ratings = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $ratings;
    }

    public function checkExitsRating($userID, $dishID) {
        $query = "SELECT EXISTS(
            SELECT 1
            FROM ratings
            WHERE userID = :userID AND dishID = :dishID
        ) AS record_exists";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':userID' => $userID, ':dishID' => $dishID));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result["record_exists"];
    }

    public function updatePredictedRating($updateQuery) {
        foreach ($updateQuery as $update) {
            $result = $this->checkExitsRating($update['userID'], $update['dishID']);
            if($result){
                $query = "UPDATE ratings SET predictedRating = :predictedRating, predictionTime = NOW() WHERE userID = :userID AND dishID = :dishID";
                $stmt = $this->db->prepare($query);
                $stmt->execute(array(':userID' => $update['userID'], ':dishID' => $update['dishID'], ':predictedRating' => $update['predictedRating']));
            }
            else{
                $query = "INSERT INTO ratings (userID, dishID, predictedRating, predictionTime) VALUES (:userID, :dishID, :predictedRating, NOW())";
                $stmt = $this->db->prepare($query);
                $stmt->execute(array(':userID' => $update['userID'], ':dishID' => $update['dishID'], ':predictedRating' => $update['predictedRating']));
            }
        }
    }

    public function getDishById($dishID) {
        $query = "SELECT * FROM dishs WHERE dishID = :dishID";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':dishID' => $dishID));
        $dishs = $stmt->fetch(PDO::FETCH_ASSOC);
        return $dishs;
    }


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
        $query = "UPDATE dishs SET dishName = :dishName, summary = :summary, updated_at = NOW() WHERE dishID = :id";
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


    public function updateAvgRating() {
        $query = "UPDATE dishs d
        LEFT JOIN (
            SELECT dishID, AVG(rating) AS avgRating
            FROM ratings
            GROUP BY dishID
        ) AS avg_ratings ON d.dishID = avg_ratings.dishID
        SET d.avgRating = avg_ratings.avgRating, d.updatedAt = NOW()";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }

    public function rateDish($dishID, $rating, $userID){
        $result = $this->checkExitsRating($userID, $dishID);
        if($result){
            $query = "UPDATE ratings SET rating = :rating, predictedRating = :predictedRating, predictionTime = NULL WHERE userID = :userID AND dishID = :dishID";
            $stmt = $this->db->prepare($query);
            $stmt->execute(array(':userID' => $userID, ':dishID' => $dishID, ':rating' => $rating/10,':predictedRating' => NULL));
        }
        else{
            $query = "INSERT INTO ratings (userID, dishID, rating, predictedRating, predictionTime) VALUES (:userID, :dishID, :rating, :predictedRating, NULL)";
            $stmt = $this->db->prepare($query);
            $stmt->execute(array(':userID' => $userID, ':dishID' => $dishID, ':rating' => $rating/10,':predictedRating' => NULL));
        }
    }

    public function getRecommendDishsByUser($userID){
        $resultRating = $this->getRecommendDishsByUserRating($userID);
        $resultPreRating = $this->getRecommendDishsByUserPreRating($userID);
        $dishs = array_merge($resultRating, $resultPreRating);
        usort($dishs, function($a, $b) {
            return $b['rating'] <=> $a['rating'];
        });
        if(count($dishs) < 10){
            $dishIDs = array_column($dishs, 'dishID');
            $randomDishs = $this->getRandomDishs($dishIDs);
            $dishs = array_merge($dishs, $randomDishs);
        }
        return array_slice($dishs, 0, 10);
    }

    public function getRecommendDishsByUserRating($userID){
        $query = "SELECT d.dishID, d.url, d.dishName, r.rating 
        FROM ratings r LEFT JOIN dishs d ON r.dishID = d.dishID 
        WHERE r.userID = :userID ORDER BY rating DESC LIMIT 10";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':userID' => $userID));
        $dishs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $dishs;
    }

    public function getRecommendDishsByUserPreRating($userID){
        $query = "SELECT d.dishID, d.url, d.dishName, r.predictedRating as rating 
        FROM ratings r LEFT JOIN dishs d ON r.dishID = d.dishID 
        WHERE r.userID = :userID ORDER BY predictedRating DESC LIMIT 10";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':userID' => $userID));
        $dishs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $dishs;
    }

    public function getRandomDishs($dishIDs){
        if(count($dishIDs)==0){
            $query = "SELECT d.dishID, d.url, d.dishName FROM dishs d ORDER BY RAND() LIMIT 10";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $dishs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $dishs;
        }
        $query = "SELECT d.dishID, d.url, d.dishName FROM dishs d WHERE d.dishID NOT IN (";
        for($i = 0; $i < count($dishIDs); $i++) {
            $query .= "\"$dishIDs[$i]\"";
            if ($i < count($dishIDs) - 1)
                $query .= ", ";
        }
        $query .= ") ORDER BY RAND() LIMIT 10";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $dishs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $dishs;
    }

}
?>