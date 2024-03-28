<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>

<div class="orders-container">
    <h1>Manage Orders</h1>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Date</th>
                <th>Status</th>
                <th>Customer</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
            <tr>
                <td><?php echo htmlspecialchars($order['order_id']); ?></td>
                <td><?php echo htmlspecialchars($order['creation_date']); ?></td>
                <td><?php echo htmlspecialchars($order['status']); ?></td>
                <td><?php echo htmlspecialchars($order['user_id']);?></td>
                <td>
                    <a href="/path/to/viewOrderDetails/<?php echo $order['order_id']; ?>">View Details</a> |
                    <a href="/path/to/changeOrderStatus/<?php echo $order['order_id']; ?>">Change Status</a> |
                    <a href="/path/to/deleteOrder/<?php echo $order['order_id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
