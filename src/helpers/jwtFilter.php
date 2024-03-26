<?php
require_once './src/helpers/jwtHelper.php';
require_once './src/database/database.php';
require_once './src/models/user.php';

function doFilterInternal(){
    $email = JwtHelper::getInstance()->validate(htmlspecialchars(strip_tags($_COOKIE['jwt'])));
    if ($email == null) {
        head('Location: logout.php');
        exit;
    }
    $db = Database::getInstance()->getConnection();
    $userModel = new User($db);
    $user = $userModel->getUserByEmail($email);
    if ($user == null) {
        head('Location: logout.php');
        exit;
    }
    return $user;
}



?>