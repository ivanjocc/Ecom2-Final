<?php

require_once __DIR__ . '/../models/User.php';

class UserController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new User($db);
    }

    public function listUsers() {
        $users = $this->userModel->read();
        require 'views/admin/listUsers.php';
    }

    public function addUser($userDetails) {
        $result = $this->userModel->create($userDetails);
        if ($result) {
            header("Location: login.php");
            exit;
        } else {
            $_SESSION['error_message'] = "Error adding the user.";
            header('Location: register.php');
            exit;
        }
    }

    public function updateUser($userId, $userDetails) {
        $result = $this->userModel->update($userId, $userDetails);
        if ($result) {
            echo "User updated successfully.";
        } else {
            echo "Error updating the user.";
        }
    }

    public function deleteUser($userId) {
        $result = $this->userModel->delete($userId);
        if ($result) {
            echo "User deleted successfully.";
        } else {
            echo "Error deleting the user.";
        }
    }
}
?>
