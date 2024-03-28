<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>

<div class="product-container">
    <h2>Add New Product</h2>
    <form action="/path/to/adminController/addProductMethod" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="product_name">Product Name:</label>
            <input type="text" id="product_name" name="product_name" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="short_description">Short Description:</label>
            <input type="text" id="short_description" name="short_description">
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" required>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" id="price" name="price" required>
        </div>
        <button type="submit">Add Product</button>
    </form>
</div>

</body>
</html>
