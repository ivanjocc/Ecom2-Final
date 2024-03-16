<?php

class ProductOrder
{
    private $conn;
    private $table_name = "ProductOrder";

    public $order_id;
    public $product_id;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create()
    {
        $query = "INSERT INTO " . $this->table_name . " (order_id, product_id) VALUES (?, ?)";

        $stmt = $this->conn->prepare($query);

        $this->order_id = htmlspecialchars(strip_tags($this->order_id));
        $this->product_id = htmlspecialchars(strip_tags($this->product_id));

        $stmt->bind_param("ii", $this->order_id, $this->product_id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function findByOrderId($orderId)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE order_id = ?";

        $stmt = $this->conn->prepare($query);

        $this->order_id = htmlspecialchars(strip_tags($orderId));

        $stmt->bind_param("i", $this->order_id);

        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }
}
?>
