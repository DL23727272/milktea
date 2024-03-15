<?php
session_start(); 


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$cartItems = $_SESSION['cart'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart | Barista</title>
    <link rel="icon" type="image/jpeg" href="/img/logo.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Include jQuery before Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <!-- Include AlertifyJS after jQuery -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <!-- Your custom scripts -->
    <script src="jquery-3.6.1.js"></script>
    <style>
        .ajs-top-right {
            top: 10px;
            right: 10px;
        }
        nav img{
            width: 70px;
            border-radius: 50px;
        }

        .img{
            width: 500px;
            height: 400px;
        }

        body{
            overflow-x: hidden;
            overflow-y: auto;
            margin: 0;
            padding: 0;
        }

        #slider {
            width: 100%; 
            height: 400px; 
            display: flex;
            overflow: hidden;
        }

        .slide {
            min-width: 100%;
            transition: transform 1.1s ease-in-out; 
        }

        .slide img {
            width: 600px;
            height: 400px;
        }
        .nav-link{
            cursor: pointer;
        }

      
    </style>
  

</head>
<body>

  <!--Navbar-->

  <nav class="navbar navbar-expand-lg bg-white sticky-top shadow p-3 mb-5">
    <div class="container-sm">
      <img src="img/Logo.jpg">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <!-- <span class="navbar-toggler-icon"></span> -->
        <i class="fa-solid fa-mug-hot"></i>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link " aria-current="page" href="index.php">Menu</a>
          <a class="nav-link" href="products.php">Order</a>
        <a href="cart.php" class="nav-link active" >Cart</a>
        </div>
      </div>
    </div>
  </nav>

  <!--Main Content-->

  <!--Cart Content Container-->
  <div id="cartContentContainer" class="container my-5">
      <h2>Your Shopping Cart</h2>
      <table id="cartTable" class="table">
          <thead>
          <tr>
              <th scope="col">Order No.</th>
              <th scope="col">Product Name</th>
              <th scope="col">Customer Name</th>
              <th scope="col">Size</th>
              <th scope="col">Temperature</th>
              <th scope="col">Price</th>
              <th scope="col">Actions</th> <!-- Added Actions column -->
          </tr>
          </thead>
          <tbody>
          <!-- Cart content will be dynamically inserted here -->
          </tbody>
      </table>

      <!-- Total amount and order button section -->
      <div class="row">
          <div class="col-md-6">
              <h4>Total Amount: <span id="totalAmount">₱0.00</span></h4>
          </div>
          <div class="col-md-6 text-end">
              <button class="btn btn-primary" onclick="placeOrder()">Place Order</button>
          </div>
      </div>
  </div>




  <!--Footer-->

  <div class="container my-5">

      <footer class="text-white text-center text-lg-start bg-primary">
      <!-- Grid container -->
      <div class="container p-4">
        <!--Grid row-->
        <div class="row mt-4">
          <!--Grid column-->
          <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
            <h5 class="text-uppercase mb-4">About Barista</h5>
    
            <p>
              At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
              voluptatum deleniti atque corrupti.
            </p>
    
            <p>
              Blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas
              molestias.
            </p>
    
            <div class="mt-4">
              <!-- Facebook -->
              <a type="button" class="btn btn-floating btn-primary btn-lg"><i class="fab fa-facebook-f"></i></a>
              <!-- Instagram -->
              <a type="button" class="btn btn-floating btn-primary btn-lg"><i class="fab fa-instagram"></i></a>
              <!-- Twitter -->
              <a type="button" class="btn btn-floating btn-primary btn-lg"><i class="fab fa-twitter"></i></a>
            </div>
          </div>
          <!--Grid column-->
    
          <!--Grid column-->
          <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
            
    
            <ul class="fa-ul" style="margin-left: 1.65em;">
              <li class="mb-3">
                <span class="fa-li"><i class="fas fa-home"></i></span><span class="ms-2">New York, NY 10012, US</span>
              </li>
              <li class="mb-3">
                <span class="fa-li"><i class="fas fa-envelope"></i></span><span class="ms-2">info@example.com</span>
              </li>
              <li class="mb-3">
                <span class="fa-li"><i class="fas fa-phone"></i></span><span class="ms-2">+ 01 234 567 88</span>
              </li>
            </ul>
          </div>
          <!--Grid column-->
    
          <!--Grid column-->
          <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase mb-4">Opening hours</h5>
    
            <table class="table text-center text-white">
              <tbody class="font-weight-normal">
                <tr>
                  <td>Mon - Thu:</td>
                  <td>8am - 9pm</td>
                </tr>
                <tr>
                  <td>Fri - Sat:</td>
                  <td>8am - 1am</td>
                </tr>
                <tr>
                  <td>Sunday:</td>
                  <td>9am - 10pm</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
      <!-- Grid container -->
    
      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2024 Copyright: DL
      </div>
      <!-- Copyright -->
    </footer>
    
  </div>
  <!-- End of .container -->



<!-- JavaScript for updating cart content -->
<script>
    // Function to refresh cart content
    function refreshCart() {
      
        $.ajax({
            type: 'GET',
            url: 'getCartContent.php',
            dataType: 'html',
            success: function(cartContent) {
                
                $('#cartTable tbody').html(cartContent);

               
                $('.cancel-btn').click(function() {
                    var index = $(this).data('index');
                   
                    var confirmRemove = confirm('Are you sure you want to remove this item from the cart?');
                    if (confirmRemove) {
                        removeFromCart(index);
                    }
                });

                // Calculate and display total amount
                calculateTotalAmount();
            },
            error: function() {
                console.error('An error occurred while refreshing the cart.');
            }
        });
    }

    // Function to remove an item from the cart
    function removeFromCart(index) {
        $.ajax({
            type: 'POST',
            url: 'removeFromCart.php',
            data: { index: index },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    refreshCart();
                    alertify.success('Item removed successfully!');
                } else {
                    alertify.error('Failed to remove the item.');
                }
            },
            error: function() {
                alertify.error('An error occurred while removing the item.');
            }
        });
    }

    // Function to calculate and display the total amount as an float lols
    function calculateTotalAmount() {
        var totalAmount = 0;

        $('#cartTable tbody tr').each(function() {
          
            var priceText = $(this).find('.price').text().replace('₱', '').trim();
            var price = parseFloat(priceText);

            if (!isNaN(price)) {
                totalAmount += Math.round(price * 100);
            }
        });

       
        $('#totalAmount').text('₱' + (totalAmount / 100).toFixed(2));
    }

   
    function placeOrder() {
        // Collect order details from the cart
        var orderDetails = [];

        $('#cartTable tbody tr').each(function() {
            var productName = $(this).find('.product-name').text();
            var customerName = $(this).find('.customer-name').text();
            var size = $(this).find('.size').text();
            var temperature = $(this).find('.temperature').text();
            var price = parseFloat($(this).find('.price').text().replace('₱', '').trim());

            // Push the order details into the array
            orderDetails.push({
                productName: productName,
                customerName: customerName,
                size: size,
                temperature: temperature,
                price: price
            });
        });

        // Use Ajax to send the order details to the PHP script
        $.ajax({
            type: 'POST',
            url: 'insertOrder.php',
            data: { orders: orderDetails },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Clear the cart after placing the order
                    clearCart();
                    alertify.success('Order placed successfully!');
                } else {
                    alertify.error('Failed to place the order.');
                }
            },
            error: function() {
                alertify.error('An error occurred while placing the order.');
            }
        });
    }

    // Function to clear the cart
    function clearCart() {
        refreshCart(); 
    }


    
    $(document).ready(function() {
      
        alertify.set('notifier', 'position', 'top-right');
        alertify.set('notifier', 'delay', 5);
        alertify.set('notifier', 'position', 'top-right');

        refreshCart();
    });
</script>

</body>
</html>