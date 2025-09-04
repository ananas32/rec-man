<?php
require_once __DIR__ . "/../models/User.php";

class UserController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User($this->db);
            if ($user->register($_POST)) {
                include __DIR__ . "/../views/success.php";
            } else {
                echo "Registration failed.";
            }
        } else {
            include __DIR__ . "/../views/register.php";
        }
    }
}