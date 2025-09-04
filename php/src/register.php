<?php
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/controllers/UserController.php';

$controller = new UserController($db);
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = $controller->register($_POST);
    if ($result === true) {
        header("Location: login.php");
        exit;
    } else {
        $errors = $result;
    }
}

include __DIR__ . '/views/register_form.php';