<?php
// signupController.php


require_once './database_connection.php';
include './html/signup.html';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate input (basic checks)
    if (empty($username) || empty($email) || empty($password)) {
        header("Location: signup.html?error=emptyfields");
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: signup.html?error=invalidemail");
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $dbConnection = DatabaseConnection::getInstance()->getConnection();
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $dbConnection->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $hashedPassword);
    $stmt->execute();

    header("Location: utilizator_logat.html");
    exit;
}
?>
