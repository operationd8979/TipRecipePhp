<?php

require_once '../models/User.php';
require_once '../database/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if (empty($email) || empty($password)) {
        $error = "Email and password are required!";
    }

    $db = Database::getInstance()->getConnection();
    $userModel = new User($db);

    $user = $userModel->authenticate($email, $password);
    if ($user) {
        header('Location: index.php');
        exit;
    } else {
        $error = "Invalid email or password!";
    }
}


?>