<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Shop</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>css/style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="#" class="navbar-logo">
                <img src="../public/images/logo.png" alt="Pet Shop Logo" style="height: 80px;">
            </a>
            <ul class="navbar-nav">
                <li><a href="#">Products</a></li>
                <li><a href="#">My Orders</a></li>
                <li><a href="#">Cart</a></li>
                <li><a href="../app/views/auth/login.php">Log In</a></li>
                <li><a href="../app/views/auth/register.php">Register</a></li>
            </ul>
        </nav>
    </header>
