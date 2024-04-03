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
            $this->login($email, $password, $error);
        }
    }


    private function login($email, $password, &$error) {
        if(validate($email, $password, $error)){
            $user = $this->userService->authenticate($email, $password);
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
}

function validate($email, $password, &$error) {
    if (empty($email) || empty($password)) {
        $error = "Email and password are required!";
        return false;
    }
    return true;
}

?>