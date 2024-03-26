<?php

require_once './src/models/User.php';
require_once './src/database/database.php';
require_once './src/helpers/jwtHelper.php';

function validate($email, $username, $password, $confirmPassword, &$error) {
    if (empty($email) || empty($username) || empty($password) || empty($confirmPassword)) {
        $error = "All fields are required!";
        return false;
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format!";
        return false;
    } 
    elseif ($password !== $confirmPassword) {
        $error = "Passwords do not match!";
        return false;
    } 
    elseif (strlen($password) < 8) {
        $error = "Password must be at least 8 characters long!";
        return false;
    }
    return true;
}

function register($email, $username, $password, $confirmPassword, &$error) {
    if(validate($email, $username, $password, $confirmPassword, $error)){
        $email = htmlspecialchars(strip_tags($email));
        $password = htmlspecialchars(strip_tags($password));
        $username = htmlspecialchars(strip_tags($username));

        $db = Database::getInstance()->getConnection();
        $userModel = new User($db);
        
        $user = $userModel->getUserByEmail($email);
        if ($user) {
            $error = "Email already exists!";
        } else {
            try {
                $userModel->createUser($email, $username, $password);
                $jwt = JwtHelper::getInstance()->generate($email);
                setcookie('jwt', $jwt, time() + 86400, '/');
                header('Location: index.php');
                exit;
            } catch (Exception $e) {
                $error = "An error occurred!";
            }
        }
    }
}



?>