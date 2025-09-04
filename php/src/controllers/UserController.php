<?php

require_once __DIR__ . '/../init.php';
require_once __DIR__ . "/../models/User.php";

class UserController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function register($data)
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $first_name = $data['first_name'] ?? '';
            $last_name = $data['last_name'] ?? '';
            $email = $data['email'] ?? '';
            $phone = $data['phone'] ?? '';
            $password = $data['password'] ?? '';

            if (!$first_name) $errors[] = "Name is required";
            if (!$last_name) $errors[] = "Last Name is required";
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Wrong Email";
            if (!preg_match('/^\+?[0-9]{7,15}$/', $phone)) $errors[] = "Worong phone number";
            if (strlen($password) < 6) $errors[] = "Password should have at least 6 chars";

            $stmt = $this->db->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->execute([$email]);
            if ($stmt->fetch()) $errors[] = "User with that email already exit";

            if (!empty($errors)) return $errors;

            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->db->prepare("INSERT INTO users (first_name,last_name,email,phone,password) VALUES (?,?,?,?,?)");
            $stmt->execute([$first_name, $last_name, $email, $phone, $hashed]);

            return true;
        }
    }
}