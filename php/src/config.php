<?php

$host = 'db';
$dbname = 'recman';
$user = 'testuser';
$pass = 'testpass';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
} catch (PDOException $e) {
    die("DB Connection failed: " . $e->getMessage());
}