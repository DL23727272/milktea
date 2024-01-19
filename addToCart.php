<?php
session_start();

function getPrice($productName, $size) {
    // Adjust the logic to fetch prices from your database or another source
    $prices = [
        'Caffe Latte' => ['venti' => 105, 'grande' => 90],
        'Cappuccino' => ['venti' => 105, 'grande' => 90],
        'Spanish Latte' => ['venti' => 125, 'grande' => 110],
        'Americano' => ['venti' => 105, 'grande' => 90],
        'Caramel Macchiato' => ['venti' => 140, 'grande' => 155],
        'Signature Latte' => ['venti' => 165, 'grande' => 150],
    ];

    return $prices[$productName][$size] ?? 0;
}

function addToCart($productName, $name, $size, $temperature) {
    // Get the price based on the product and size
    $price = getPrice($productName, $size);

    // Adjust the logic as needed
    $cartItem = [
        'productName' => $productName,
        'name' => $name,
        'size' => $size,
        'temperature' => $temperature,
        'price' => $price,
    ];

    // Store the total price in the session
    $_SESSION['cart'][] = $cartItem;

    // Prepare the response array with the added item details
    $response = [
        'status' => 'success',
        'item' => $cartItem,
    ];

    // Respond with the JSON-encoded response
    echo json_encode($response);
}

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Call the addToCart function with the posted data
    addToCart($_POST['productName'], $_POST['name'], $_POST['size'], $_POST['temperature']);
} else {
    // Respond with an error if not a POST request
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
