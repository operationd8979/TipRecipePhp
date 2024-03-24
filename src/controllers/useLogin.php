<?php

require_once './src/models/user.php';
require_once './src/database/database.php';
require_once './src/helpers/jwtHelper.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if (empty($email) || empty($password)) {
        $error = "Email and password are required!";
    } else {
        $email = htmlspecialchars(strip_tags($email));
        $password = htmlspecialchars(strip_tags($password));
        
        $db = Database::getInstance()->getConnection();
        $userModel = new User($db);

        $user = $userModel->authenticate($email, $password);
        if ($user) {
            $jwt = JwtHelper::getInstance()->generate($email);
            setcookie('jwt', $jwt, time() + 86400, '/');
            header('Location: index.php');
            exit;
        } else {
            $error = "Invalid email or password!";
        }
    }

}

?>