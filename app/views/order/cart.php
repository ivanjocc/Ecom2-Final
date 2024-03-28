<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>

<div class="cart-container">
    <h1>Shopping Cart</h1>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cartItems as $item): ?>
            <tr>
                <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                <td>$<?php echo htmlspecialchars($item['price']); ?></td>
                <td>
                    <form action="/path/to/updateQuantity" method="POST">
                        <input type="number" name="quantity" value="<?php echo htmlspecialchars($item['quantity']); ?>" min="1">
                        <input type="hidden" name="product_id" value="<?php echo $item['product_id']; ?>">
                        <button type="submit">Update</button>
                    </form>
                </td>
                <td>$<?php echo htmlspecialchars($item['price'] * $item['quantity']); ?></td>
                <td>
                    <a href="/path/to/removeFromCart/<?php echo $item['product_id']; ?>" onclick="return confirm('Are you sure?');">Remove</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="cart-summary">
        <h2>Cart Total: $<?php echo $cartTotal; ?></h2>
        <a href="/path/to/checkout">Proceed to Checkout</a>
    </div>
</div>

</body>
</html>
