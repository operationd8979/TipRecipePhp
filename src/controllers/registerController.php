<?php
require_once './src/helpers/jwtHelper.php';
require_once './src/helpers/jwtFilter.php';
require_once './src/services/userService.php';


class RegisterController{
    private $userService;

    public function __construct(){
        $this->userService = UserService::getInstance();
    }

    public function invoke(&$error){
        doFilterInternal();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = htmlspecialchars(strip_tags($_POST['email']));
            $username = htmlspecialchars(strip_tags($_POST['username']));
            $password = htmlspecialchars(strip_tags($_POST['password']));
            $confirmPassword = htmlspecialchars(strip_tags($_POST['confirmPassword']));
            $this->register($email, $username, $password, $confirmPassword, $error);
        }
    }

    private function register($email, $username, $password, $confirmPassword, &$error) {
        if(validate($email, $username, $password, $confirmPassword, $error)){
            $email = htmlspecialchars(strip_tags($email));
            $password = htmlspecialchars(strip_tags($password));
            $username = htmlspecialchars(strip_tags($username));
    
            $user = $this->userService->getUserByEmail($email);
            if ($user) {
                $error = "Email already exists!";
            } else {
                try {
                    session_start();
                    $this->userService->createUser($email, $username, $password);
                    $jwt = JwtHelper::getInstance()->generate($email);
                    setcookie('jwt', $jwt, time() + 86400, '/');
                    $_SESSION['role'] = "USER";
                    header('Location: index.php');
                    exit;
                } catch (Exception $e) {
                    $error = "An error occurred!";
                }
            }
        }
    }


}

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


?>