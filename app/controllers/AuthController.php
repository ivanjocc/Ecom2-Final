<?php

require_once 'models/User.php';

class AuthController
{
    private $userModel;

    public function __construct($db)
    {
        $this->userModel = new User($db);
    }

    public function login($email, $password)
    {
        $user = $this->userModel->findByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            echo "Login successful.";
        } else {
            echo "Invalid email or password.";
        }
    }

    public function register($userData)
    {
        $userExists = $this->userModel->findByEmail($userData['email']);
        if ($userExists) {
            echo "Email already in use.";
            return false;
        }
        
        $result = $this->userModel->create($userData);
        if ($result) {
            echo "Registration successful.";
            return true;
        } else {
            echo "Error during registration.";
            return false;
        }
    }

    public function profile()
    {
        $userId = $_SESSION['user_id']; 
        $user = $this->userModel->findById($userId);
        require 'views/auth/profile.php';
    }
}
?>
