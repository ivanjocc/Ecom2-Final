<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>

<div class="profile-container">
    <h2>User Profile</h2>
    <div class="profile-info">
        <p><strong>First Name:</strong> <?php echo htmlspecialchars($user['first_name']); ?></p>
        <p><strong>Last Name:</strong> <?php echo htmlspecialchars($user['last_name']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($user['date_of_birth']); ?></p>
        <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($user['phone_number']); ?></p>
    </div>
    <!-- <a href="/path/to/editProfile">Edit Profile</a> -->
</div>

</body>
</html>
