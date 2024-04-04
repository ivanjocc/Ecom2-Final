<?php

require_once __DIR__ . '/../models/User.php';

class AuthController
{
    private $userModel;

    public function __construct($db)
    {
        $this->userModel = new User($db);
    }

    public function login() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->userModel->authenticate($email, $password);

        if ($user) {
            session_start();
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['role_id'] = $user['role_id'];
            
            header("Location: profile.php");
        } else {
            echo "Credenciales incorrectas.";
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

    public function profile() {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            header('Location: login.php');
            exit;
        }

        $userId = $_SESSION['user_id'];
        $user = $this->userModel->findById($userId);

        if (!$user) {
            echo "User not found.";
            exit;
        }

        require_once '../views/auth/profile.php';
    }   
}
?>
