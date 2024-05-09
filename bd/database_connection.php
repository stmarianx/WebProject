<?php
class DatabaseConnection {
    private static $instance;
    private $connection; 

    
    private function __construct() {
        $this->connection = new PDO('mysql:host=localhost; dbname=compaste', 'root', '');
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
