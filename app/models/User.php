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

    // Getters and setters
    public function getLastName()
    {
        return $this->last_name;
    }

    public function setLastName($lastName)
    {
        $this->last_name = $lastName;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    // Constructor
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // CRUD (Create, Read, Update, Delete)
    public function read()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create($userDetails)
    {
        $query = "INSERT INTO `User` (last_name, first_name, email, password, date_of_birth, phone_number, image_path, role_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);

        $hashedPassword = password_hash($userDetails['password'], PASSWORD_DEFAULT);

        $role_id = 1;

        $stmt->bind_param("sssssssi", $userDetails['last_name'], $userDetails['first_name'], $userDetails['email'], $hashedPassword, $userDetails['date_of_birth'], $userDetails['phone_number'], $userDetails['image_path'], $role_id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($userDetails)
    {
        $query = "UPDATE `User` SET last_name = ?, first_name = ?, email = ?, date_of_birth = ?, phone_number = ?, image_path = ?, role_id = ? WHERE user_id = ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bind_param("ssssssii", $userDetails['last_name'], $userDetails['first_name'], $userDetails['email'], $userDetails['date_of_birth'], $userDetails['phone_number'], $userDetails['image_path'], $userDetails['role_id'], $userDetails['user_id']);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($userId)
    {
        $query = "DELETE FROM `User` WHERE user_id = ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bind_param("i", $userId);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function findById($userId)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE user_id = :userId LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? $result : null;
    }


    public function findByEmail($email)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = ? LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function authenticate($email, $password) {
        // Prepara la consulta SQL
        $stmt = $this->conn->prepare("SELECT user_id, email, password, role_id FROM User WHERE email = ?");
        $stmt->bind_param("s", $email);
        
        // Ejecuta la consulta
        $stmt->execute();
        
        // Obtiene los resultados
        $result = $stmt->get_result();
        if ($user = $result->fetch_assoc()) {
            // Verifica la contraseña
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false;
    }
}
