
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mjh.css">
</head>
<body>
    <header class="header">

      <nav class="navbar">
        <ul class="navbar-list">
          <li><a class="navbar-link" href="index.php">Home</a></li>
          <li><a class="navbar-link" href="Products.php">Products</a></li>
          <?php
              $count = 0;
               if (isset($_SESSION['cart'])) {
                 $count = count($_SESSION['cart']);
               }
          ?>
          <li><a class="navbar-link" href="Cart.php">My Cart(<?php echo $count?>)</a></li>
          <li><a class="navbar-link" href="admin_login.php">Admin Portal</a></li>
          <li><a class="navbar-link" href="registration.php">Registraion</a></li>
        </ul>
      </nav>

      <div class="mobile-navbar-btn">
        <ion-icon name="menu-outline" class="mobile-nav-icon"></ion-icon>
        <ion-icon name="close-outline" class="mobile-nav-icon"></ion-icon>
      </div>
    </header>
    <!-- ======================================== 
          Our JavaScript Section Start  
    ========================================  -->
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
    <script src="Partials/index.js"></script>
</body>
</html>