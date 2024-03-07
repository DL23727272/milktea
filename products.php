


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Order | Barista</title>
    <link rel="icon" type="image/jpeg" href="/img/Logo.jpg">
     <!-- Alertify sakit sa ulo -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <script src="jquery-3.6.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

        /*------Products------*/
        .cup:hover{
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        }
        .product{
            margin: 20px;
        }
        .divs{
            width: 100%;
            margin: auto;
            text-align: center;
            padding-top: 50px;
        }
        .divs h1{
            font-size: 32px;
            color: black;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }
        .cup{
            flex-basis: 32%;
            border-radius: 30px;
            margin-bottom: 20px;
            position: relative;
            overflow: hidden;
            width: fit-content;
            display: block;
        }
        .cup img{
        width: 400px;
        height: 290px;
        }
        .row{
            margin-top: 5%;
            display: flex;
            justify-content: space-between;
        }
        .layer{
            background: transparent;
            height: 100%;
            width: 100%;
            position: absolute;
            top: 0;
            transition: 0.5s;  
        }
        .layer:hover{
            background: rgba(42, 44, 43, 0.7);
        }
        .layer h3{
            width: 100%;
            font-weight: 500;
            color: #fff;
            font-size: 26px;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            position: absolute;
            opacity: 0;
            transition: 0.5s;
        }
        .layer:hover h3{
            bottom: 49%;
            opacity: 1;
        }

        @media(max-width: 1000px){
            .container{
                background:  white; 
                z-index: 9999;
                position: -webkit-sticky; /* Safari */
                position: sticky;
                top: 0;
            }
            .row{
                align-items: center;
                flex-direction: column;
            }
            .cup img{
                width: 300px;
              }
        }
    </style>
  
    <script>
       var currentImage = 1;

        function showNextImage() {
        // Slide to the next image
        $('#slider').animate({ scrollLeft: currentImage * $('.slide').width() }, 1100, function() {
                // Get the next image index (cycling back to the first image if needed)
                currentImage = (currentImage % 3) + 1;
            });
        }

        $(document).ready(function() {
            // Show the first image initially
            currentImage = 1;

            // Set the interval to change the image every 3000ms (3 seconds)
            setInterval(showNextImage, 3000);
        });
    </script>

</head>
<body>
<?php include 'modals.php'; ?>

  <!--Navbar-->

  <nav class="navbar navbar-expand-lg bg-white sticky-top shadow p-3 mb-5">
    <div class="container-sm">
      <img src="img/Logo.jpg">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link " aria-current="page" href="index.php">Menu</a>
          <a class="nav-link active" href="products.php">Order</a>
        <a href="cart.php" class="nav-link">Cart</a>
        </div>
      </div>
    </div>
  </nav>

  <!--Main Content-->

  <div class="product">
      <section class="divs">
      <h1>Our Brewed Coffee Collections</h1>
      <p>Barista</p>
      <div class="row">
          <div class="cup">
              <img src="img/iced.jpg">
              <div class="layer">
                  <a href="#"  data-bs-toggle="modal" data-bs-target="#coffee1"><h3>Caffe Latte</h3></a>
              </div>
          </div>

          <div class="cup">
              <img src="img/iced.jpg">
              <div class="layer">
                  <a href="#"data-bs-toggle="modal" data-bs-target="#coffee2"><h3>Capuccino</h3></a>
              </div>
          </div>

          <div class="cup">
              <img src="img/iced.jpg">
              <div class="layer">
                  <a href="#" data-bs-toggle="modal" data-bs-target="#coffee3"><h3>Spanish Latte</h3></a>
              </div>
          </div>
      </div>
  </section>
  </div>

  <div class="product">
      <section class="divs">
      <h1>Our Espresso Coffee Collections</h1>
      <p>Barista</p>
      <div class="row">
          <div class="cup">
              <img src="img/iced.jpg">
              <div class="layer">
                <a href="#" data-bs-toggle="modal" data-bs-target="#coffee4"><h3>Americano</h3></a>
              </div>
          </div>

          <div class="cup">
              <img src="img/iced.jpg">
              <div class="layer">
                <a href="#" data-bs-toggle="modal" data-bs-target="#coffee5"><h3>Caramel Macchiato</h3></a>
              </div>
          </div>

          <div class="cup">
              <img src="img/iced.jpg">
              <div class="layer">
                <a href="#" data-bs-toggle="modal" data-bs-target="#coffee6"><h3>Signature Latte</h3></a>
              </div>
          </div>
      </div>
  </section>
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

<!-- Script block to include addToCart function -->
<script>
  function addToCart(productName, name, size, temperature) {
      // Use AJAX to call addToCart.php
      $.ajax({
          type: 'POST',
          url: 'addToCart.php',
          data: {
              productName: productName,
              name: $('#' + name).val(),
              size: $('#' + size).val(),
              temperature: $('#' + temperature).val(),
          },
          dataType: 'json',
          success: function(response) {
              if (response.status === 'success') {
                
                  $('#' + name).val('');
                  $('#' + size).val('venti'); 
                  $('#' + temperature).val('iced'); 

                
                  $('#coffee1').modal('hide');
                  $('#coffee2').modal('hide');
                  $('#coffee3').modal('hide');
                  $('#coffee4').modal('hide');
                  $('#coffee5').modal('hide');
                  $('#coffee6').modal('hide');

                
                  refreshCart();
                  alertify.success('Item added to cart!');
              } else {
                  alertify.error('Failed to add item to cart.');
              }
          },
          error: function() {
              alertify.error('An error occurred while adding the item to the cart.');
          }
      });
  }


  function refreshCart() {
    
      $.ajax({
          type: 'GET',
          url: 'getCartContent.php',
          dataType: 'html',
          success: function(cartContent) {
            
              $('#cartTable tbody').html(cartContent);
          },
          error: function() {
              console.error('An error occurred while refreshing the cart.');
          }
      });
  }

  // Call refreshCart function when the page loads
  $(document).ready(function() {
    
      alertify.set('notifier', 'position', 'top-right');
      alertify.set('notifier', 'delay', 5);
      alertify.set('notifier', 'position', 'top-right');

      refreshCart();
    });
</script>


</body>
</html>