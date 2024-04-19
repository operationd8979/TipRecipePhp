<?php
use PHPUnit\Framework\TestCase;

class testRegister extends TestCase
{

    public static function setUpBeforeClass(): void
    {
        require_once './src/controllers/registerController.php';
        $_SERVER['REQUEST_URI'] = 'http://localhost/TipRecipe/register.php';
    }

    public function testNoBodyRequest()
    {
        //given

        //when
        $registerController = new RegisterController();
        $error = "";
        $registerController->invoke($error);
        
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
        $_POST['username'] = "operationddd";
        $_POST['password'] = "123456";
        $_POST['confirmPassword'] = "123456";

        //when
        $registerController = new RegisterController();
        $error = "";
        $registerController->invoke($error);
        
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
        $_POST['username'] = "operationddd";
        $_POST['password'] = "123456";
        $_POST['confirmPassword'] = "123456";

        //when
        $registerController = new RegisterController();
        $error = "";
        $registerController->invoke($error);
        
        //then
        $this->assertEquals("All fields are required!", $error);
    }

    public function testEmptyUsername()
    {
        //given
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }  
        $_SERVER['REQUEST_METHOD'] = 'POST';   
        $_SESSION['captcha'] = "123456";
        $_POST['captcha'] = "123456";
        $_POST['email'] = "operationddd@gmail.com";
        $_POST['username'] = "";
        $_POST['password'] = "123456";
        $_POST['confirmPassword'] = "123456";

        //when
        $registerController = new RegisterController();
        $error = "";
        $registerController->invoke($error);
        
        //then
        $this->assertEquals("All fields are required!", $error);
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
        $_POST['username'] = "operationddd";
        $_POST['password'] = "";
        $_POST['confirmPassword'] = "123456";

        //when
        $registerController = new RegisterController();
        $error = "";
        $registerController->invoke($error);
        
        //then
        $this->assertEquals("All fields are required!", $error);
    }


    public function testEmptyConfirmPassword()
    {
        //given
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }  
        $_SERVER['REQUEST_METHOD'] = 'POST';   
        $_SESSION['captcha'] = "123456";
        $_POST['captcha'] = "123456";
        $_POST['email'] = "operationddd@gmail.com";
        $_POST['username'] = "operationddd";
        $_POST['password'] = "123456";
        $_POST['confirmPassword'] = "";

        //when
        $registerController = new RegisterController();
        $error = "";
        $registerController->invoke($error);
        
        //then
        $this->assertEquals("All fields are required!", $error);
    }

    public function testWrongConfirmPassword()
    {
        //given
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }  
        $_SERVER['REQUEST_METHOD'] = 'POST';   
        $_SESSION['captcha'] = "123456";
        $_POST['captcha'] = "123456";
        $_POST['email'] = "operationddd@gmail.com";
        $_POST['username'] = "operationddd";
        $_POST['password'] = "123456";
        $_POST['confirmPassword'] = "213456";

        //when
        $registerController = new RegisterController();
        $error = "";
        $registerController->invoke($error);
        
        //then
        $this->assertEquals("Passwords do not match!", $error);
    }

    public function testWrongFormatEmail()
    {
        //given
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }  
        $_SERVER['REQUEST_METHOD'] = 'POST';   
        $_SESSION['captcha'] = "123456";
        $_POST['captcha'] = "123456";
        $_POST['email'] = "operationdddgmail.com";
        $_POST['username'] = "operationddd";
        $_POST['password'] = "123456";
        $_POST['confirmPassword'] = "123456";

        //when
        $registerController = new RegisterController();
        $error = "";
        $registerController->invoke($error);
        
        //then
        $this->assertEquals("Invalid email format!", $error);
    }
    
    public function testWeakPassword()
    {
        //given
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }  
        $_SERVER['REQUEST_METHOD'] = 'POST';   
        $_SESSION['captcha'] = "123456";
        $_POST['captcha'] = "123456";
        $_POST['email'] = "operationddd@gmail.com";
        $_POST['username'] = "operationddd";
        $_POST['password'] = "123456";
        $_POST['confirmPassword'] = "123456";

        //when
        $registerController = new RegisterController();
        $error = "";
        $registerController->invoke($error);
        
        //then
        $this->assertEquals("Password must be at least 8 characters long!", $error);
    }


    public function testAlreadyTakenEmail()
    {
        //given
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }  
        $_SERVER['REQUEST_METHOD'] = 'POST';   
        $_SESSION['captcha'] = "12345678";
        $_POST['captcha'] = "12345678";
        $_POST['email'] = "operationddd@gmail.com";
        $_POST['username'] = "operationddd";
        $_POST['password'] = "12345678";
        $_POST['confirmPassword'] = "12345678";

        //when
        $registerController = new RegisterController();
        $error = "";
        $registerController->invoke($error);
        
        //then
        $this->assertEquals("Email already exists!", $error);
    }

    public function testSuccess()
    {
        //given
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }  
        $email ="operationddd1234@gmail.com";
        $_SERVER['REQUEST_METHOD'] = 'POST';   
        $_SESSION['captcha'] = "123456";
        $_POST['captcha'] = "123456";
        $_POST['email'] = $email;
        $_POST['username'] = "operationddd";
        $_POST['password'] = "12345678";
        $_POST['confirmPassword'] = "12345678";

        //when
        $registerController = new RegisterController();
        $error = "";
        $registerController->invoke($error);

        //then
        require_once './src/services/userService.php';
        // $token = $_COOKIE['jwt'];
        $token = $_SESSION['jwt'];
        $user = UserService::getInstance()->getUserByToken($token);

        $this->assertEquals($email, $user['email']??"");

    }

}

?>