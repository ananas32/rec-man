<?php
class User {
    private $conn;
    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($data) {
        $stmt = $this->conn->prepare(
            "INSERT INTO users (first_name, last_name, email, phone, password) VALUES (?, ?, ?, ?, ?)"
        );

        $hashed = password_hash($data['password'], PASSWORD_DEFAULT);

        return $stmt->execute([
            $data['first_name'],
            $data['last_name'],
            $data['email'],
            $data['phone'],
            $hashed
        ]);
    }

    public function login($email, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}