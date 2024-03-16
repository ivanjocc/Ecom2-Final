<?php

require_once 'models/Product.php';
require_once 'models/User.php';
require_once 'models/Order.php';

class AdminController
{
    private $productModel;
    private $userModel;
    private $orderModel;

    public function __construct($db)
    {
        $this->productModel = new Product($db);
        $this->userModel = new User($db);
        $this->orderModel = new Order($db);
    }

    public function dashboard()
    {
        require 'views/admin/dashboard.php';
    }

    public function addProduct($productDetails)
    {
        $result = $this->productModel->create($productDetails);
        if ($result) {
            echo "Product added successfully.";
        } else {
            echo "Error adding the product.";
        }
    }

    public function listUsers()
    {
        $users = $this->userModel->read();
        require 'views/admin/listUsers.php';
    }

    public function deleteUser($userId)
    {
        $result = $this->userModel->delete($userId);
        if ($result) {
            echo "User deleted successfully.";
        } else {
            echo "Error deleting the user.";
        }
    }

    public function viewOrders()
    {
        $orders = $this->orderModel->read();
        require 'views/admin/viewOrders.php';
    }
}
?>
