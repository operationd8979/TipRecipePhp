<?php

class Type {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getTypes() {
        $query = "SELECT * FROM typedishs";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $types = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $types;
    }

    public function getTypeById($typeID) {
        $query = "SELECT * FROM typedisks WHERE typeID = :typeID";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':typeID' => $typeID));
        $types = $stmt->fetch(PDO::FETCH_ASSOC);
        return $types;
    }

    public function createType($typeName) {
        $rand = rand(100000, 999999);
        $typeID = uniqid().$rand;
        $query = "INSERT INTO typedisks (typeID, typeName) VALUES (:typeID, :typeName)";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':typeID' => $typeID, ':typeName' => $typeName));
    }


    public function updateTypes($typeID, $typeName) {
        $query = "UPDATE typedisks SET typeName = :typeName WHERE typeID = :typeID";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':typeID' => $typeID, ':typeName' => $typeName));
    }

}


?>