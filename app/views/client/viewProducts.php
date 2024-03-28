<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>

<div class="products-container">
    <h1>Our Products</h1>
    <div class="products-list">
        <?php foreach ($products as $product): ?>
        <div class="product-item">
            <h2><?php echo htmlspecialchars($product['product_name']); ?></h2>
            <p><?php echo htmlspecialchars($product['short_description']); ?></p>
            <p><strong>Price:</strong> $<?php echo htmlspecialchars($product['price']); ?></p>
            <img src="/path/to/product/image/<?php echo $product['image_path']; ?>" alt="Product Image">
            <a href="/path/to/addToCart/<?php echo $product['product_id']; ?>">Add to Cart</a>
        </div>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>
