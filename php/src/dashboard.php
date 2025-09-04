<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header("Location: /login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
<h2>Welcome, <?= htmlspecialchars($_SESSION['email']) ?></h2>
<p>You are logged in!</p>
<a href="/logout.php" class="btn btn-danger">Logout</a>
</body>
</html>