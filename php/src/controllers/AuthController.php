<?php
require_once __DIR__."/../models/User.php";

class AuthController {
    private $db;
    public function __construct($db) {
        $this->db = $db;
        session_start();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = new User($this->db);
            $user = $userModel->login($_POST['email'], $_POST['password']);

            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                include __DIR__."/../views/dashboard.php";
            } else {
                $error = "Invalid email or password";
                include __DIR__."/../views/login.php";
            }
        } else {
            include __DIR__."/../views/login.php";
        }
    }

    public function logout() {
        session_destroy();
        header("Location: /");
    }
}