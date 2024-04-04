<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form action="./process_login.php" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br />
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br />
        <button type="submit">Login</button>
        <br />
        <a href="register.php">Don't have an account?</a>
    </form>
</body>
</html>
