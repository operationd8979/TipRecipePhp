<?php
require_once './src/database/database.php';
require_once './src/models/Type.php';

class TypeService{
    private $db;
    private $typeModel;
    public static $instance = null;

    public function __construct(){
        $this->db = Database::getInstance()->getConnection();
        $this->typeModel = new Type($this->db);
    }

    public static function getInstance(){
        if (!self::$instance) {
            self::$instance = new TypeService();
        }
        return self::$instance;
    }

    public function getTypes(){
        return $this->typeModel->getTypes();
    }

}

?>