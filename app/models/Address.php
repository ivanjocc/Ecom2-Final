<?php

class Address
{
    private $conn;
    private $table_name = "Address";

    public $address_id;
    public $street;
    public $postal_code;
    public $city;
    public $number;
    public $province;

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
        $query = "INSERT INTO " . $this->table_name . " (street, postal_code, city, number, province) VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);

        $this->street=htmlspecialchars(strip_tags($this->street));
        $this->postal_code=htmlspecialchars(strip_tags($this->postal_code));
        $this->city=htmlspecialchars(strip_tags($this->city));
        $this->number=htmlspecialchars(strip_tags($this->number));
        $this->province=htmlspecialchars(strip_tags($this->province));

        $stmt->bind_param("issss", $this->street, $this->postal_code, $this->city, $this->number, $this->province);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

}

?>
