<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="/public/css/style.css"> <!-- Asegúrate de ajustar la ruta según tu estructura -->
</head>
<body>

<div class="users-container">
    <h1>Manage Users</h1>
    <a href="/path/to/addUserForm">Add New User</a>
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo htmlspecialchars($user['user_id']); ?></td>
                <td><?php echo htmlspecialchars($user['first_name']); ?></td>
                <td><?php echo htmlspecialchars($user['last_name']); ?></td>
                <td><?php echo htmlspecialchars($user['email']); ?></td>
                <td>
                    <a href="/path/to/editUserForm/<?php echo $user['user_id']; ?>">Edit</a> |
                    <a href="/path/to/deleteUser/<?php echo $user['user_id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
