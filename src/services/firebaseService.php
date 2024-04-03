<?php
require_once './vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseService
{
    private $database;
    private $auth;
    private $storage;
    public static $instance;

    private function __construct()
    {
        $firebase = (new Factory)
            ->withServiceAccount('./config/fir-a3ee6-firebase-adminsdk-2vo05-7aa60a70a5.json');
        $this->database = $firebase->createDatabase();
        $this->auth = $firebase->createAuth();
        $this->storage = $firebase->createStorage();
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new FirebaseService();
        }
        return self::$instance;
    }

    public function getDatabase()
    {
        return $this->database;
    }

    public function getAuth()
    {
        return $this->auth;
    }

    public function getStorage()
    {
        return $this->storage;
    }
}



?>