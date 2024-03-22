<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="css/asd.css">
    <title>Admin Work Place</title>
</head>
<body>

<?php include ("Partials/header.php"); ?>

    <div class="banner1">
        <img src="images/banner1.jpg" alt="">
        <div class="banner1_headings">
        <h1>Administrator Portal</h1>
        <h5>Only for Admin work</h5>
        </div>
        <div class="dropdown">
          <button class="dropbtn">Dropdown</button>
          <div class="dropdown-content">
              <a class="upload_button" href="upload_product_data.php">Launch Product</a>
              <a href="logout.php"> Logout </a>
        </div>
</div>
    </div>





    <div class="permotion_massiges">
        <h1>Greate Deals</h1>
    </div>

    <div class="Product_list">

      <?php 
		 include "Functions/connect.php";
		 $sql = "SELECT * FROM product_data ORDER BY id DESC";
		 $res = mysqli_query($conn, $sql);

		 if (mysqli_num_rows($res) > 0) {
		 	while ($images = mysqli_fetch_assoc($res)) { 
	  ?>

    
      <div class="Item_list">
        <div class="product">
            <img src="uploads/<?=$images['image']?>">
            <div class="product_name">
            <p> <?=$images['product_name']?> </p>
            <h2> RS: <?=$images['price']?> </h2>
            <a class="delete" href="Functions/delete.php?id=<?=$images['id']?>">DELETE</a>
            </div>
        </div>
      </div>
    
   

      <?php 
	     }
		 }else {
		 	echo "<h1>Product is'nt Uploaded Yet!</h1>";
		 }
	  ?>
   
   </div>

    <div class="banner2">
        <img src="images/banner2.jpg" alt="">
    </div>

    <footer class="section-p1">
        <div class="col">
            <h2 class="logo">Ahmed Shop.com</h2>
            <h4>Contect Us</h4>
            <p> <strong>Address:</strong>Street no 98 House no 782 Anything road Japan</p>
            <p> <strong>Phone no:</strong>+01 2222 365 /(+91) 01 2345 6789</p>
            <p> <strong>Timing:</strong>10:00 - 18:00, Mon - Sat</p>
 
            <div class="follow"></div>
            <h4>Follow us</h4>
            <div class="icon">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-pinterest"></i>
                <i class="fab fa-youtube"></i>
 
            </div>
        </div>
        <div class="col">
            <h4>About us</h4>
            <a href="#">About us</a>
            <a href="#">Delivery information</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">Contact us</a>
        </div> 
     <div class="copyright">
         <p>@ 2022, Tech2 etc - HTML CSS Ecommerce Template</p>
     </div>
             
     
     
    </footer>

</body>
</html>