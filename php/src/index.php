<?php
require_once "config.php";
require_once "controllers/UserController.php";

$controller = new UserController($db);
$controller->register();