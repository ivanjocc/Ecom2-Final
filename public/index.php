<?php 
require_once __DIR__ . '/../config/database.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Shop</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php include __DIR__ . '/../app/views/includes/header.php'; ?>
    
    <?php
    if (!empty($viewPath)) {
        include $viewPath;
    } else {
        echo '<h1>Welcome to Pet Shop</h1>';
    }
    ?>
    
    <?php include __DIR__ . '/../app/views/includes/footer.php'; ?>
</body>
</html>
