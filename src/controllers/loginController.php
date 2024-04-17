<?php
require_once './src/helpers/jwtHelper.php';
require_once './src/helpers/jwtFilter.php';
require_once './src/services/userService.php';

class LoginController {
    private $userService;

    public function __construct() {
        $this->userService = UserService::getInstance();
    }

    public function invoke(&$error){
        doFilterInternal();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = htmlspecialchars(strip_tags($_POST['email']));
            $password = htmlspecialchars(strip_tags($_POST['password']));
            $captcha = $_POST['captcha'];
            $this->login($email, $password, $captcha, $error);
        }
    }


    private function login($email, $password, $captcha, &$error) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }        
        if ($captcha != $_SESSION['captcha']) {
            $error = "Invalid captcha!";
            return;
        }
        if(validate($email, $password, $error)){
            $user = $this->userService->authenticate($email, $password);
            if ($user) {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                } 
                $jwt = JwtHelper::getInstance()->generate($email);
                setcookie('jwt', $jwt, time() + 86400, '/');
                $_SESSION['role'] = $user['role'];
                header('Location: index.php');
                exit;
            } else {
                $error = "Invalid email or password!";
            }
        }
    }
}

function validate($email, $password, &$error) {
    if (empty($email) || empty($password)) {
        $error = "Email and password are required!";
        return false;
    }
    return true;
}

?>