<?php
require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../controllers/ProductController.php';

$database = getDatabaseConnection();
$productController = new ProductController($database);

$productController->listProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de Productos</title>
</head>
<body>
    <h1>Productos Disponibles</h1>
    <div class="product-list">
        <?php foreach ($products as $product): ?>
            <div class="product">
                <h2><?php echo htmlspecialchars($product['product_name']); ?></h2>
                <p><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
                <p>Precio: $<?php echo htmlspecialchars($product['price']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
