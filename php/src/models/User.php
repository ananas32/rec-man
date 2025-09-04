<?php

class User
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function register($data)
    {
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
}