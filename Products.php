<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>

<?php include ("Partials/header.php"); ?>

<div class="Product_list">
        
        <?php 
             include "Functions/connect.php";
             $sql = "SELECT * FROM product_data ORDER BY id DESC";
             $res = mysqli_query($conn, $sql);
    
             if (mysqli_num_rows($res) > 0) {
                 while ($images = mysqli_fetch_assoc($res)) { 
        ?>
    
        
        <div class="Item_list">
          <form action="Cart_Managment.php" method="POST">
            <div class="product">
                <img src="uploads/<?=$images['image']?>">
                <div class="product_name">
                <p> <?=$images['product_name']?> </p>
                <h2> RS: <?=$images['price']?> </h2>
                <button type="submit" name="Add_To_Cart"> ADD TO CART</button>
                <input type="hidden" name="Item_name" value="<?=$images['product_name']?>">
                <input type="hidden" name="Price" value="<?=$images['price']?>">
                </div>
            </div>
          </form>
        </div>
        
       
    
        <?php 
             }
             }else {
                 echo "<h1>No Product Uploaded Yet!</h1>";
             }
        ?>
       
</div>

<?php include ("Partials/footer.php"); ?>


</body>
</html>