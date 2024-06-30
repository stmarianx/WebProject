<?php
require '../bd/database_connection.php';
require '../vendor/autoload.php';
require '../utils/jwt.php';
require '../models/UserModel.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['c_password'];

    if ($password !== $confirmPassword) {
        echo json_encode(['error' => 'Passwords do not match.']);
        exit;
    }

    $userModel = new UserModel();
    if ($userModel->addUser($username, $email, $password)) {
        $userId = $userModel->get_id($username);
        $jwt = createJWT($userId);
        echo json_encode(['token' => $jwt]);
    } else {
        echo json_encode(['error' => 'Registration failed.']);
    }
}
?>
