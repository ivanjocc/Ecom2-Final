<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require_once __DIR__ . '/../../../config/database.php';
$db = getDatabaseConnection();

$stmt = $db->prepare("SELECT first_name, last_name FROM `User` WHERE user_id = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$userInfo = $stmt->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Perfil del Usuario</title>
</head>
<body>
    <h1>Bienvenido, <?php echo htmlspecialchars($userInfo['first_name']); ?></h1>
    <p>Nombre: <?php echo htmlspecialchars($userInfo['first_name']) . " " . htmlspecialchars($userInfo['last_name']); ?></p>
</body>
</html>
