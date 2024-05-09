<?php
require_once '../bd/database_connection.php';

 class UserModel{

    function addUser($username, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

         $dbConnection = DatabaseConnection::getInstance()->getConnection();
         $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $dbConnection->prepare($sql);
        $stmt->bindParam(1, $username, PDO::PARAM_STR);
        $stmt->bindParam(2, $email, PDO::PARAM_STR);
        $stmt->bindParam(3, $hashedPassword, PDO::PARAM_STR);        
        $stmt->execute();
        //de facut ceva la esec inserare
    }
}