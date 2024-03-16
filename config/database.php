<?php

function getDatabaseConnection() {
    $servername = "localhost";
    $username = "root";
    $pwd = "";
    $dbname = "PetShop";

    $conn = new mysqli($servername, $username, $pwd, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
?>
