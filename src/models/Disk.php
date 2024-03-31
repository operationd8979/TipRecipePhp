<?php

class Disk {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // public function getDisks() {
    //     $query = "SELECT * FROM disks";
    //     $stmt = $this->db->prepare($query);
    //     $stmt->execute();
    //     $disks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     return $disks;
    // }
    

    // SELECT d.diskID, d.diskName, d.summary, GROUP_CONCAT(DISTINCT i.ingredientName) as ingredients, GROUP_CONCAT(DISTINCT t.typeName) as types
    // FROM `disks` d 
    // JOIN `diskingredients` di ON d.diskID = di.diskID
    // JOIN `ingredients` i ON di.ingredientID = i.ingredientID
    // JOIN `disktypes` dt ON d.diskID = dt.diskID
    // JOIN `typedisks` t ON dt.typeID = t.typeID
    // GROUP BY d.diskID
    // HAVING d.diskName LIKE "%sườn%" 
    // and d.diskID IN 
    // (SELECT diskID FROM `diskingredients` WHERE ingredientID IN (14,63) GROUP BY diskID HAVING COUNT(DISTINCT ingredientID) = 2)
    // and d.diskID IN
    // (SELECT diskID FROM `disktypes` WHERE typeID IN (1,2))
    public function getDisks($search, $ingredients, $types) {
        $query = "SELECT d.diskID, d.diskName, d.summary, d.url, GROUP_CONCAT(DISTINCT i.ingredientName) as ingredients, GROUP_CONCAT(DISTINCT t.typeName) as types
        FROM `disks` d
        JOIN `diskingredients` di ON d.diskID = di.diskID
        JOIN `ingredients` i ON di.ingredientID = i.ingredientID
        JOIN `disktypes` dt ON d.diskID = dt.diskID
        JOIN `typedisks` t ON dt.typeID = t.typeID
        GROUP BY d.diskID
        Having d.diskName LIKE :search";
        if (count($ingredients) > 0) {
            $query .= " and d.diskID IN (SELECT diskID FROM diskingredients WHERE ingredientID IN (";
            $query .= implode(",", $ingredients);
            $query .= ")
            GROUP BY diskID
            HAVING COUNT(DISTINCT ingredientID) = ";
            $query .= count($ingredients);
            $query .= ")";
        }
        if (count($types) > 0) {
            $query .= " and d.diskID IN (SELECT diskID FROM disktypes WHERE typeID IN (";
            $query .= implode(",", $types);
            $query .= "))";
        }
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':search' => "%$search%"));
        $disks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $disks;
    }

    public function getDiskById($diskID) {
        $query = "SELECT * FROM disks WHERE diskID = :diskID";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':diskID' => $diskID));
        $disks = $stmt->fetch(PDO::FETCH_ASSOC);
        return $disks;
    }

}


?>