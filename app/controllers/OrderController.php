<?php

require_once 'models/Order.php';
require_once 'models/ProductOrder.php';

class OrderController
{
    private $orderModel;
    private $productOrderModel;

    public function __construct($db)
    {
        $this->orderModel = new Order($db);
        $this->productOrderModel = new ProductOrder($db);
    }

    public function viewCart()
    {
        require 'views/order/cart.php';
    }

    public function addOrder($orderDetails)
    {
        $result = $this->orderModel->create($orderDetails);
        if ($result) {
            echo "Order placed successfully.";
        } else {
            echo "Error placing order.";
        }
    }

    public function viewOrders($userId)
    {
        $orders = $this->orderModel->findByUserId($userId);
        require 'views/order/viewOrders.php';
    }
}
?>
