<?php
session_start();

function getPrice($productName, $size) {
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
    $price = getPrice($productName, $size);

    $cartItem = [
        'productName' => $productName,
        'name' => $name,
        'size' => $size,
        'temperature' => $temperature,
        'price' => $price,
    ];

    $_SESSION['cart'][] = $cartItem;

    $response = [
        'status' => 'success',
        'item' => $cartItem,
    ];

    echo json_encode($response);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    addToCart($_POST['productName'], $_POST['name'], $_POST['size'], $_POST['temperature']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
