<?php
include_once '../../config/config.php';

class Database {
    
    private static $instance = null;
    
    private $connection;

    private function __construct() {
        try {
            global $DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME;
            $this->connection = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }

}

?>