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

    public function create($userDetails) {
        $query = "INSERT INTO `User` (last_name, first_name, email, password, date_of_birth, phone_number, image_path, role_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);

        // Hashea la contraseña antes de guardarla
        $hashedPassword = password_hash($userDetails['password'], PASSWORD_DEFAULT);

        $role_id = 1;

        $stmt->bind_param("sssssssi", $userDetails['last_name'], $userDetails['first_name'], $userDetails['email'], $hashedPassword, $userDetails['date_of_birth'], $userDetails['phone_number'], $userDetails['image_path'], $role_id);

        if($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
