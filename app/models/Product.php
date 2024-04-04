<?php

class Product
{
    private $conn;
    private $table_name = "Product";

    public $product_id;
    public $product_name;
    public $description;
    public $short_description;
    public $quantity;
    public $price;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Leer todos los productos
    public function getAllProducts() {
        $products = [];
        $sql = "SELECT product_id, product_name, description, price FROM Product";
        $result = $this->conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }

        return $products;
    }

    // Crear un nuevo producto
    public function createProduct($productName, $description, $price) {
        $stmt = $this->conn->prepare("INSERT INTO Product (product_name, description, price) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $productName, $description, $price);
        return $stmt->execute(); // Devuelve true si la operación es exitosa
    }

    // Actualizar un producto
    public function updateProduct($productId, $productName, $description, $price) {
        $stmt = $this->conn->prepare("UPDATE Product SET product_name = ?, description = ?, price = ? WHERE product_id = ?");
        $stmt->bind_param("ssdi", $productName, $description, $price, $productId);
        return $stmt->execute(); // Devuelve true si la operación es exitosa
    }

    // Eliminar un producto
    public function deleteProduct($productId) {
        $stmt = $this->conn->prepare("DELETE FROM Product WHERE product_id = ?");
        $stmt->bind_param("i", $productId);
        return $stmt->execute(); // Devuelve true si la operación es exitosa
    }
}
?>
