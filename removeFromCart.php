<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['index'])) {
    $index = $_POST['index'];

    if (isset($_SESSION['cart'][$index])) {
        // Remove the item from the cart
        unset($_SESSION['cart'][$index]);

        // Re-index the array to prevent issues with JSON encoding
        $_SESSION['cart'] = array_values($_SESSION['cart']);

        // Prepare the response array
        $response = [
            'status' => 'success',
            'message' => 'Item removed from the cart.'
        ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Invalid item index.'
        ];
    }
} else {
    $response = [
        'status' => 'error',
        'message' => 'Invalid request method or missing index.'
    ];
}

// Respond with the JSON-encoded response
echo json_encode($response);
?>
