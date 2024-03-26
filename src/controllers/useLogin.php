<?php

require_once './src/models/user.php';
require_once './src/database/database.php';
require_once './src/helpers/jwtHelper.php';


function validate($email, $password, &$error) {
    if (empty($email) || empty($password)) {
        $error = "Email and password are required!";
        return false;
    }
    return true;
}

function login($email, $password, &$error) {
    if(validate($email, $password, $error)){
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