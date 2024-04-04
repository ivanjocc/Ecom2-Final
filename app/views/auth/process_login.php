<?php

require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../controllers/AuthController.php';

$db = getDatabaseConnection();
$authController = new AuthController($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $authController->login();
}

?>
