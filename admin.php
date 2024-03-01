
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Barista</title>
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

    <style>
        .table-container {
            margin: 20px;
        }
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
<?php   include 'D:\xampp\htdocs\milktea\createDB.php'; ?>
       
  <!--Navbar-->

    <nav class="navbar navbar-expand-lg bg-white sticky-top shadow p-3 mb-5">
        <div class="container-sm">
        <img src="img/Logo.jpg">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <a class="nav-link " aria-current="page" href="index.php">Home</a>
            <!---<a class="nav-link" href="/order">Order</a> --->
            </div>
        </div>
        </div>
    </nav>

    <?php 
        $today = date('Y-m-d');
        $query = "SELECT * FROM orders WHERE DATE(order_date) = '$today'";
        $result = mysqli_query($conn, $query);

        $totalOrders = mysqli_num_rows($result);
    ?>
    
    <div class="table-container">
        <h2>Total Orders: <span id="totalOrders"><?php echo $totalOrders; ?></span></h2>
        <div class="table-responsive">
            <table id="cartTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Order No.</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Size</th>
                        <th scope="col">Temperature</th>
                        <th scope="col">Price</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php

                    $query = "SELECT * FROM orders ";
                    $result = mysqli_query($conn, $query);
                
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                ?>
                <tbody>
                    <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["product_name"]; ?></td>
                    <td><?php echo $row["customer_name"]; ?></td>
                    <td><?php echo $row["size"]; ?></td>
                    <td><?php echo $row["temperature"]; ?></td>
                    <td><?php echo $row["price"]; ?></td>
                    <td><?php echo $row["order_date"]; ?></td>
                        <td>
                                <button class="btn btn-success cancel-btn" data-order-id="{{ $order->id }}">Done</button>
                        </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
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



<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script>

    $(document).ready(function() {
        $('#cartTable').on('click', '.cancel-btn', function() {
            var row = $(this).closest('tr');
            var orderId = $(this).data('order-id');

            // Now you can use the orderId as needed
            console.log('Order ID:', orderId);

            $.ajax({
                type: 'POST',
                url: 'your_php_script.php', 
                data: {
                    orderId: orderId,
                    action: 'markOrderAsDone',
                    csrf_token: '<?php //echo csrf_token(); ?>'
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        alertify.success('Order marked as done!');
                        row.hide();
                        updateTotalOrdersCount();
                    } else {
                        alertify.error('Failed to update order status.');
                    }
                },
                error: function() {
                    alertify.error('An error occurred while updating the order status.');
                }
            });
        });
    });

    function updateTotalOrdersCount() {
        var totalOrders = parseInt($('#totalOrders').text());
        $('#totalOrders').text(totalOrders - 1);
    }
    alertify.set('notifier', 'position', 'top-right');
    alertify.set('notifier', 'delay', 5);

</script>
</body>
</html>
