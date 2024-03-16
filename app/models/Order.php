<?php

class Order
{
    private $conn;
    private $table_name = "`Order`";

    public $order_id;
    public $quantity;
    public $price;
    public $creation_date;
    public $status;
    public $user_id;

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
        $query = "INSERT INTO " . $this->table_name . " (quantity, price, creation_date, status, user_id) VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);

        $this->quantity=htmlspecialchars(strip_tags($this->quantity));
        $this->price=htmlspecialchars(strip_tags($this->price));
        $this->creation_date=htmlspecialchars(strip_tags($this->creation_date));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));

        $stmt->bind_param("isssi", $this->quantity, $this->price, $this->creation_date, $this->status, $this->user_id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
