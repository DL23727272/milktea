<?php
session_start();

// Check if the 'cart' session variable exists
if (isset($_SESSION['cart'])) {
    $cartItems = $_SESSION['cart'];

    // Insert orders into the database
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "milktea"; 

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the current date and time
    $orderDate = date('Y-m-d H:i:s');

    foreach ($cartItems as $cartItem) {
        $productName = $cartItem['productName'];
        $customerName = $cartItem['name'];
        $size = $cartItem['size'];
        $temperature = $cartItem['temperature'];
        $price = $cartItem['price'];

        $sql = "INSERT INTO orders (product_name, customer_name, size, temperature, price, order_date) 
                VALUES ('$productName', '$customerName', '$size', '$temperature', $price, '$orderDate')";

        if ($conn->query($sql) !== TRUE) {
            echo json_encode(['status' => 'error']);
            $conn->close();
            exit();
        }
    }

    // Clear the cart after placing the order
    unset($_SESSION['cart']);

    echo json_encode(['status' => 'success']);
    $conn->close();
} else {
    echo json_encode(['status' => 'error']);
}
?>
