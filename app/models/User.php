<?php

class User
{
    private $conn;
    private $table_name = "`User`";

    public $user_id;
    public $last_name;
    public $first_name;
    public $email;
    public $password;
    public $date_of_birth;
    public $phone_number;
    public $image_path;
    public $role_id;

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
        $query = "INSERT INTO " . $this->table_name . " (last_name, first_name, email, password, date_of_birth, phone_number, image_path, role_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);

        $this->last_name=htmlspecialchars(strip_tags($this->last_name));
        $this->first_name=htmlspecialchars(strip_tags($this->first_name));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->password=password_hash($this->password, PASSWORD_DEFAULT);
        $this->date_of_birth=htmlspecialchars(strip_tags($this->date_of_birth));
        $this->phone_number=htmlspecialchars(strip_tags($this->phone_number));
        $this->image_path=htmlspecialchars(strip_tags($this->image_path));
        $this->role_id=htmlspecialchars(strip_tags($this->role_id));

        $stmt->bind_param("sssssssi", $this->last_name, $this->first_name, $this->email, $this->password, $this->date_of_birth, $this->phone_number, $this->image_path, $this->role_id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
