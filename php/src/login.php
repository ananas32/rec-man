<?php
require_once "config.php";
require_once "controllers/AuthController.php";

$auth = new AuthController($db);
$auth->login();