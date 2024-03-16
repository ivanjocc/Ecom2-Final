<?php

require_once 'models/Product.php';

class ProductController
{
    private $productModel;

    public function __construct($db)
    {
        $this->productModel = new Product($db);
    }

    public function listProducts()
    {
        $products = $this->productModel->read();
        require 'views/client/viewProducts.php';
    }

    public function addProduct($productDetails)
    {
        $result = $this->productModel->create($productDetails);
        if ($result) {
            echo "Product added successfully.";
        } else {
            echo "Error adding the product.";
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
