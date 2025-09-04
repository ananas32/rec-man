<?php

require_once __DIR__ . '/init.php';
require_once "config.php";
require_once "controllers/AuthController.php";

$auth = new AuthController($db);
$auth->login();