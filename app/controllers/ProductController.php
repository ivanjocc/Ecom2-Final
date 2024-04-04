<?php

require_once __DIR__ . '/../models/Product.php';

class ProductController
{
    private $productModel;

    public function __construct($db)
    {
        $this->productModel = new Product($db);
    }

    public function listProducts() {
        $products = $this->productModel->getAllProducts();
        require_once "views/client/viewProducts.php";
    }

    public function addProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productName = $_POST['productName'];
            $description = $_POST['description'];
            $price = $_POST['price'];
    
            $success = $this->productModel->createProduct($productName, $description, $price);
    
            if ($success) {
                // Producto agregado exitosamente, redirige o muestra un mensaje
            } else {
                // Error al agregar el producto
            }
        }
    
    }

    public function updateProduct($productId, $productDetails)
    {
        $result = $this->productModel->update($productId, $productDetails);
        if ($result) {
            echo "Product updated successfully.";
        } else {
            echo "Error updating the product.";
        }
    }

    public function deleteProduct($productId)
    {
        $result = $this->productModel->delete($productId);
        if ($result) {
            echo "Product deleted successfully.";
        } else {
            echo "Error deleting the product.";
        }
    }
}
?>
