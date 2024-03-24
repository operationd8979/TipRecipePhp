<?php

class User {
    private $db;

    private $userID;
    private $email;
    private $username;
    private $password;
    private $createdAt;
    private $updatedAt;

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

}


?>