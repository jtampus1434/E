<?php
session_start();

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/login':
        require __DIR__ . '/controller/loginController.php';
        break;
    case '/register':
        require __DIR__ . '/public/register.php';  // Path to register.php
        break;
    case '/home':
        require __DIR__ . '/view/home.php';
        break;
    default:
        require __DIR__ . '/view/404.php'; // For unknown routes
        break;
}
?>
