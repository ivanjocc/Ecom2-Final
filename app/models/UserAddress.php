<?php

class UserAddress
{
    private $conn;
    private $table_name = "UserAddress";

    public $user_id;
    public $address_id;

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
        $query = "INSERT INTO " . $this->table_name . " (user_id, address_id) VALUES (?, ?)";

        $stmt = $this->conn->prepare($query);

        $this->user_id=htmlspecialchars(strip_tags($this->user_id));
        $this->address_id=htmlspecialchars(strip_tags($this->address_id));

        $stmt->bind_param("ii", $this->user_id, $this->address_id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
