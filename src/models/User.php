<?php

class User {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getUserByEmail($email) {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':email' => $email));
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    private function verifyPassword($user, $password) {
        return password_verify($password, $user['password']);
    }


    public function authenticate($email, $password) {
        $user = $this->getUserByEmail($email);
        if ($user && $this->verifyPassword($user, $password)) {
            return $user; 
        } else {
            return null; 
        }
    }

    public function createUser($email, $username, $password) {
        $rand = rand(100000, 999999);
        $userID = uniqid().$rand;
        $query = "INSERT INTO users (userID, email, username, password) VALUES (:userID, :email, :username, :password)";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':userID' => $userID, ':email' => $email, ':username' => $username, ':password' => password_hash($password, PASSWORD_DEFAULT)));
    }

    public function updateUser($user, $username, $email, $password) {
        $userID = $user['userID'];
        if($username == "") {
            $username = $user['username'];
        }
        if($email == "") {
            $email = $user['email'];
        }
        if($password == ""){
            $password = $user['password'];
        }
        else{
            $password = password_hash($password, PASSWORD_DEFAULT);
        }
        $query = "UPDATE users SET username = :username, email = :email, password = :password, updated_at = NOW() WHERE userID = :userID";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':userID' => $userID, ':username' => $username, ':email' => $email, ':password' => $password));
    }

}


?>