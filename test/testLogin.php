<?php
use PHPUnit\Framework\TestCase;

class testLogin extends TestCase
{

    public static function setUpBeforeClass(): void
    {
        require_once './src/controllers/loginController.php';
        $_SERVER['REQUEST_URI'] = 'http://localhost/TipRecipe/login.php';
    }

    public function testNoBodyRequest()
    {
        //given
        
        //when
        $loginController = new LoginController();
        $error = "";
        $loginController->invoke($error);
        
        //then
        $this->assertEquals("", $error);
    }

    public function testWrongCatcha()
    {
        //given
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }   
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_SESSION['captcha'] = "123456";
        $_POST['captcha'] = "12345";
        $_POST['email'] = "operationddd@gmail.com";
        $_POST['password'] = "123456";

        //when
        $loginController = new LoginController();
        $error = "";
        $loginController->invoke($error);
        
        //then
        $this->assertEquals("Invalid captcha!", $error);
    }

    public function testEmptyEmail()
    {
        //given
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }  
        $_SERVER['REQUEST_METHOD'] = 'POST';   
        $_SESSION['captcha'] = "123456";
        $_POST['captcha'] = "123456";
        $_POST['email'] = "";
        $_POST['password'] = "123456";

        //when
        $loginController = new LoginController();
        $error = "";
        $loginController->invoke($error);
        
        //then
        $this->assertEquals("Email and password are required!", $error);
    }

    public function testEmptyPassword()
    {
        //given
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }  
        $_SERVER['REQUEST_METHOD'] = 'POST';   
        $_SESSION['captcha'] = "123456";
        $_POST['captcha'] = "123456";
        $_POST['email'] = "operationddd@gmail.com";
        $_POST['password'] = "";

        //when
        $loginController = new LoginController();
        $error = "";
        $loginController->invoke($error);
        
        //then
        $this->assertEquals("Email and password are required!", $error);
    }

    
    public function testSuccess()
    {
        //given
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }  
        $email ="operationddd@gmail.com";
        $_SERVER['REQUEST_METHOD'] = 'POST';   
        $_SESSION['captcha'] = "123456";
        $_POST['captcha'] = "123456";
        $_POST['email'] = $email;
        $_POST['password'] = "12345678";

        //when
        $loginController = new LoginController();
        $error = "";
        $loginController->invoke($error);

        //then
        require_once './src/services/userService.php';
        // $token = $_COOKIE['jwt'];
        $token = $_SESSION['jwt'];
        $user = UserService::getInstance()->getUserByToken($token);

        $this->assertEquals($email, $user['email']??"");
    }
    
}

?>