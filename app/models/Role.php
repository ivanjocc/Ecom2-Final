<?php

class Role
{
    private $conn;
    private $table_name = "Role";

    public $role_id;
    public $description;

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
        $query = "INSERT INTO " . $this->table_name . " (description) VALUES (?)";

        $stmt = $this->conn->prepare($query);

        $this->description=htmlspecialchars(strip_tags($this->description));

        $stmt->bind_param("s", $this->description);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
