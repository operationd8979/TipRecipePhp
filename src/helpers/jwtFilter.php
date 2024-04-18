<?php
require_once './src/database/database.php';
require_once './src/models/user.php';
require_once './src/services/userService.php';


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
        if(isset($_COOKIE['jwt'])&&(strpos($url, 'login')||strpos($url, 'register'))){
            $user = UserService::getInstance()->getUserByToken(htmlspecialchars(strip_tags($_COOKIE['jwt'])));
            if($user != null){
                header('Location: index.php');
                exit;
            }
            header('Location: logout.php');
        }
        return;
    }
    if(!isset($_COOKIE['jwt'])){
        header('Location: logout.php');
        exit;
    }
    $user = UserService::getInstance()->getUserByToken(htmlspecialchars(strip_tags($_COOKIE['jwt'])));
    if($user != null && $user['role']){
        if($user['role'] == $role[0]){
            if(!empty(array_filter($USER_LIST_URL, function($path) use ($url){
                return strpos($url, $path);
            }))){
                return $user;
            }
            header('Location: index.php');
            exit;
        }
        if($user['role'] == $role[1]){
            if(!empty(array_filter($ADMIN_LIST_URL, function($path) use ($url){
                return strpos($url, $path);
            }))){
                return $user;
            }
            header('Location: admin.php');
            exit;
        }
    }
    header('Location: logout.php');
    exit;
}



?>