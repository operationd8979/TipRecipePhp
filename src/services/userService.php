<?php
require_once './src/database/database.php';
require_once './src/models/User.php';

class UserService{
    private $db;
    private $userModel;
    public static $instance = null;

    public function __construct(){
        $this->db = Database::getInstance()->getConnection();
        $this->userModel = new User($this->db);
    }

    public static function getInstance(){
        if (!self::$instance) {
            self::$instance = new UserService();
        }
        return self::$instance;
    }

    public function getUserByEmail($email){
        return $this->userModel->getUserByEmail($email);
    }

    public function authenticate($email, $password){
        return $this->userModel->authenticate($email, $password);
    }

    public function createUser($email, $username, $password){
        return $this->userModel->createUser($email, $username, $password);
    }

    public function updateUser($user, $username, $email, $password){
        return $this->userModel->updateUser($user, $username, $email, $password);
    }

}

?>