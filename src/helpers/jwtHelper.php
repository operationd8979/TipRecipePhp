<?php
require_once './vendor/autoload.php';
require_once './config/config.php';
use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

class JwtHelper{

    private static $instance = null;
     
    private $secretKey;
    private $algorithm;
    private $expiration;

    public function __construct(){
        $this->secretKey = SECRET_KEY;
        $this->algorithm = ALGORITHM;
        $this->expiration = EXPIRATION;
    }

    public static function getInstance(){
        if(self::$instance == null){
            self::$instance = new JwtHelper();
        }
        return self::$instance;
    }
    
    public function generate($email) {
        $time = time();
        $payload = array(
            'iat' => $time,
            'exp' => $time + $this->expiration,
            'data' => $email
        );
        return JWT::encode($payload, $this->secretKey, $this->algorithm);
    }

    private function extract($token) {
        try {
            $headers = new stdClass();
            $decoded = JWT::decode($token, new Key($this->secretKey, $this->algorithm));
            return $decoded;
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function validate($token) {
        $decoded = $this->extract($token);
        if ($decoded == null) {
            return null;
        }
        $time = time();
        if ($decoded->exp < $time) {
            return null;
        }
        return $decoded->data;
    }
        
}


?>