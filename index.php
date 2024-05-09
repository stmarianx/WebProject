<?php
 include './html/index.html';
$requestedUrl = $_SERVER['REQUEST_URI'];

switch ($requestedUrl) {

    case '/proiect_Web/login':
        $controller = 'loginController';
        break;
    case '/proiect_Web/signup':
        $controller = 'signupController';
        break;
    default:
        $controller = 'notFoundController';
        break;
}

require_once 'controllers/' . $controller . '.php';
call_user_func($controller . '_action');
?>

