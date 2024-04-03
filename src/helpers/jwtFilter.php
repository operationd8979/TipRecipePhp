<?php
require_once './src/helpers/jwtHelper.php';
require_once './src/database/database.php';
require_once './src/models/user.php';


function doFilterInternal(){
    $url = $_SERVER['REQUEST_URI'];
    $config = include './config/configRoute.php';
    $WHITE_LIST_URL = $config['WHITE_LIST_URL'];
    $USER_LIST_URL = $config['USER_LIST_URL'];
    $ADMIN_LIST_URL = $config['ADMIN_LIST_URL'];
    $role = $config['role'];
    if(!empty(array_filter($WHITE_LIST_URL, function($path) use ($url){
        return strpos($url, $path);
    }))){
        if(isset($_COOKIE['jwt'])){
            header('Location: index.php');
            exit;
        }
        return;
    }
    if(!isset($_COOKIE['jwt'])){
        header('Location: logout.php');
        exit;
    }
    $email = JwtHelper::getInstance()->validate(htmlspecialchars(strip_tags($_COOKIE['jwt'])));
    if($email != null){
        $db = Database::getInstance()->getConnection();
        $userModel = new User($db);
        $user = $userModel->getUserByEmail($email);
        if($user != null && $user['role']){
            if($user['role'] == $role[0]){
                if(!empty(array_filter($USER_LIST_URL, function($path) use ($url){
                    return strpos($url, $path);
                }))){
                    return $user;
                }
            }
            if($user['role'] == $role[1]){
                if(!empty(array_filter($ADMIN_LIST_URL, function($path) use ($url){
                    return strpos($url, $path);
                }))){
                    return $user;
                }
            }
        }
    }
    header('Location: logout.php');
    exit;
}



?>