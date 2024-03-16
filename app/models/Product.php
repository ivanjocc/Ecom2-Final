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

    public function read()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create()
    {
        $query = "INSERT INTO " . $this->table_name . " (product_name, description, short_description, quantity, price) VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);

        $this->product_name=htmlspecialchars(strip_tags($this->product_name));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->short_description=htmlspecialchars(strip_tags($this->short_description));
        $this->quantity=htmlspecialchars(strip_tags($this->quantity));
        $this->price=htmlspecialchars(strip_tags($this->price));

        $stmt->bind_param("sssii", $this->product_name, $this->description, $this->short_description, $this->quantity, $this->price);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
