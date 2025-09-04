<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../controllers/UserController.php';

$controller = new UserController($db);
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = $controller->register($_POST);
    if ($result === true) {
        header("Location: login.php");
        exit;
    } else {
        $errors = $result; // масив помилок
    }
}

// Підключаємо в’ю форму
include __DIR__ . '/../views/register_form.php';

<?php
require_once __DIR__ . '/../init.php';
require_once __DIR__ . '/../controllers/UserController.php';

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
<h2>User Registration</h2>
<form method="POST" action="">
    <div class="mb-3">
        <label>First name</label>
        <input type="text" name="first_name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Last name</label>
        <input type="text" name="last_name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Mobile phone</label>
        <input type="text" name="phone" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>

<?php
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p style='color:red'>$error</p>";
    }
}
?>
</body>
</html>