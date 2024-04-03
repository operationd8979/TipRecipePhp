<?php
require_once './src/helpers/jwtFilter.php';
require_once './src/services/userService.php';

class ProfileController{
    private $userService;

    public function __construct(){
        $this->userService = UserService::getInstance();
    }

    public function invoke(&$error, &$user){
        doFilterInternal();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = htmlspecialchars(strip_tags($_POST['username']));
            $email = htmlspecialchars(strip_tags($_POST['email']));
            $password = htmlspecialchars(strip_tags($_POST['password']));
            $this->updateUser($username, $email, $password, $error);
        }
        $user = $this->getUserInfo();
    }

    private function getUserInfo(){
        return doFilterInternal();
    }

    private function updateUser($username, $email, $password, &$error){
        $user = doFilterInternal();
        if($error = validateUpdate($user, $username, $email, $password)){
            return;
        }
        $this->userService->updateUser($user, $username, $email, $password);
    }
    

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





?>