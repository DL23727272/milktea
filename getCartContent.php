<?php
session_start();

$cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

foreach ($cartItems as $index => $cartItem) {
    echo '<tr>';
    echo '<td>' . ($index + 1) . '</td>';
    echo '<td>' . $cartItem['productName'] . '</td>';
    echo '<td>' . $cartItem['name'] . '</td>';
    echo '<td>' . $cartItem['size'] . '</td>';
    echo '<td>' . $cartItem['temperature'] . '</td>';
    echo '<td class="price">₱' . number_format($cartItem['price'], 2) . '</td>'; // Display the formatted price
    echo '<td><button class="btn btn-danger cancel-btn" data-index="' . $index . '">Cancel</button></td>';
    echo '</tr>';
}
?>
