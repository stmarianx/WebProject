<?php
class DatabaseConnection { //The singleton
    private static $instance;
    private $connection; 

    
    private function __construct() {
        echo "DA";
        $this->connection = new PDO('mysql:host=localhost;dbname=compaste', 'root', 'password');
    }


    public static function getInstance(): DatabaseConnection {
        if (!self::$instance) {
            self::$instance = new DatabaseConnection();
        }
        return self::$instance;
    }

    public function getConnection(): PDO {
        return $this->connection;
    }
}
?>
