<?php
require '../vendor/autoload.php';
use \Firebase\JWT\JWT;

function createJWT($userId) {
    $secretKey = "your_secret_key";
    $issuedAt = time();
    $expirationTime = $issuedAt + 3600; // jwt valid for 1 hour
    $payload = [
        'userId' => $userId,
        'iat' => $issuedAt,
        'exp' => $expirationTime
    ];
    $jwt = JWT::encode($payload, $secretKey);
    return $jwt;
}

function verifyJWT($jwt) {
    $secretKey = "your_secret_key";
    try {
        $decoded = JWT::decode($jwt, $secretKey, array('HS256'));
        return (array) $decoded;
    } catch (Exception $e) {
        return false;
    }
}
?>
