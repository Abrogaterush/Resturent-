<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" 
                integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" 
                crossorigin="anonymous"/>
    <title>Home</title>
</head>
<body>

<?php include ("Partials/header.php"); ?>

    <div class="banner1">
        <img src="images/banner1.jpg" alt="">
        <div class="banner1_headings">
        <h1>Welcome to our Resturent</h1>
        <h5>With Reasonable Prices</h5>
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
                <button type="submit" name="Add_To_Cart"> ADD TO CART</button>
                </div>
            </div>
        </div>
        
       
    
        <?php 
             }
             }else {
                 echo "<h1>No Product Uploaded Yet!</h1>";
             }
        ?>
       
       </div>
    

    <div class="banner2">
        <img src="images/banner2.jpg" alt="">
            <h1>Greate Deals With Great Prices</h1>

    </div>

    <?php include ("Partials/footer.php"); ?>

</body>
</html>