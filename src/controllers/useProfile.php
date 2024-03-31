<?php
require_once './src/helpers/jwtFilter.php';
require_once './src/database/database.php';
require_once './src/models/User.php';

function getUserInfo(){
    $user = doFilterInternal();
    return $user;
}

function validateUpdate($user ,$username, $email, $password){
    if($username == "" && $email == "" && $password == ""){
        return "Please fill in the fields";
    }
    if($username == $user['username'] && $email == $user['email'] && $password == ""){
        return "No changes made";
    }
    if($email != "" && !filter_var($email, FILTER_VALIDATE_EMAIL)){
        return "Invalid email";
    }
    return "";
}

function updateUser($username, $email, $password, &$error){
    $user = doFilterInternal();
    if($error = validateUpdate($user, $username, $email, $password)){
        return;
    }
    $db = Database::getInstance()->getConnection();
    $userModel = new User($db);
    $userModel->updateUser($user, $username, $email, $password);
}



?>