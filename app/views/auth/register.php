<?php
require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../controllers/UserController.php';


// Inicializa el controlador con acceso a la base de datos
$db = getDatabaseConnection();
$userController = new UserController($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userDetails = [
        'last_name' => $_POST['last_name'],
        'first_name' => $_POST['first_name'],
        'email' => $_POST['email'],
        'password' => $_POST['password'], // Asegúrate de hashear esta contraseña antes de guardarla en la base de datos
        'date_of_birth' => '1990-01-01', // Ajusta según tu formulario
        'phone_number' => '0000000000', // Ajusta según tu formulario
        'image_path' => '', // Ajusta según tu formulario
        'role_id' => 1 // Ajusta según tu formulario o lógica de negocio
    ];

    $result = $userController->addUser($userDetails);

    if ($result) {
        echo "User added successfully.";
        header("Location: login.php");
    } else {
        echo "Error adding the user.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../../../public/css/style.css">
</head>
<body>

<div class="register-container">
    <h2>Register</h2>
    <form action="../auth/register.php" method="POST">
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Register</button>
    </form>
    <a href="./login.php">Already have an account?</a>
</div>

</body>
</html>
